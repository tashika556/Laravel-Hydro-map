document.addEventListener("DOMContentLoaded", function () {
  // Get references to the buttons and filter_wrap element
  var showFilterButton = document.getElementById("showFilter");
  var closeFilterButton = document.getElementById("closeFilter");
  var filterWrap = document.querySelector(".filter_wrap");

  // Function to show the filter
  function showFilter() {
    filterWrap.classList.remove("hidden");
    showFilterButton.style.display = "none";
    closeFilterButton.style.display = "inline-block";
  }

  // Function to hide the filter
  function hideFilter() {
    filterWrap.classList.add("hidden");
    showFilterButton.style.display = "inline-block";
    closeFilterButton.style.display = "none";
  }

  // Check viewport width
  function checkViewportWidth() {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    if (viewportWidth >= 768) { // Assuming 768px as the breakpoint for mobile
      showFilter(); // Open filter by default for laptop view
    } else {
      hideFilter(); // Close filter by default for mobile view
    }
  }

  // Attach event listeners to the buttons
  showFilterButton.addEventListener("click", showFilter);
  closeFilterButton.addEventListener("click", hideFilter);

  // Call checkViewportWidth initially and on window resize
  checkViewportWidth();
  window.addEventListener("resize", checkViewportWidth);
});

// filter end


$(document).ready(function () {
  
  $(".youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
    disableOn: 700,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    autoplay: true,
  });

  $(".sub-btn").click(function () {
    $(this).next(".sub-menu").slideToggle();
    $(this).find(".dropdown").toggleClass("rotate");
  });

  $(".menu-btn").click(function () {
    $(".side-bar").addClass("active");
    $(".menu-btn").css("visibility", "hidden");
  });

  $(".close-btn").click(function () {
    $(".side-bar").removeClass("active");
    $(".menu-btn").css("visibility", "visible");
  });
});
// Counter animation
var a = 0;
$(window).scroll(function () {
  var e = $("#counter-box").offset().top - window.innerHeight;
  if (a === 0 && $(window).scrollTop() > e) {
    $(".counter").each(function () {
      var e = $(this),
        t = e.attr("data-number");
      $({ countNum: e.text() }).animate(
        {
          countNum: t,
        },
        {
          duration: 850,
          easing: "swing",
          step: function () {
            e.text(Math.ceil(this.countNum).toLocaleString("en"));
          },
          complete: function () {
            e.text(Math.ceil(this.countNum).toLocaleString("en"));
          },
        }
      );
    });
    a = 1;
  }
});



var provinceMap, provinceGeoJson, stateGeoJson;

// Initialize map
provinceMap = L.map("map", {
  scrollWheelZoom: false,
  touchZoom: false,
  doubleClickZoom: false,
  zoomControl: true,
  dragging: true,
}).setView([28.3949, 84.124], 8);

// GeoJSON data
provinceGeoJson = L.geoJson(allDistricts, {
  style: style,
  onEachFeature: onEachFeature,
}).addTo(provinceMap);

var bound = provinceGeoJson.getBounds();
provinceMap.fitBounds(bound);

/**
 *  Functions for map
 **/
function style(feature) {
  return {
    weight: 2,
    opacity: 1,
    color: "#FFF",
    dashArray: "1",
    fillOpacity: 0.7,
    fillColor: getProvinceColor(feature.properties.Province),
  };
}

function highlightFeature(e) {
  var layer = e.target;
  layer.setStyle({
    weight: 2,
    color: "black",
    dashArray: "",
    fillOpacity: 0.7,
    fillColor: "#fff",
  });

  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
  }
}

function getProvinceColor(province) {
  switch (province) {
    case 1:
      return "red";
      break;
    case 2:
      return "green";
      break;
    case 3:
      return "pink";
      break;
    case 4:
      return "lightblue";
      break;
    case 5:
      return "lightgreen";
      break;
    case 6:
      return "yellow";
      break;
    case 7:
      return "orange";
      break;
    default:
      return "skyblue";
      break;
  }
}

function resetHighlight(e) {
  provinceGeoJson.resetStyle(e.target);
  // info.update();
}

function zoomToProvince(e) {
  var json,
    province_number = e.target.feature.properties.Province;

  provinceMap.fitBounds(e.target.getBounds());
  console.log(stateGeoJson);

  if (stateGeoJson != undefined) {
    stateGeoJson.clearLayers();
  }

  switch (province_number) {
    case 1:
      json = province_1;
      break;
    case 2:
      json = province_2;
      break;
    case 3:
      json = province_3;
      break;
    case 4:
      json = province_4;
      break;
    case 5:
      json = province_5;
      break;
    case 6:
      json = province_6;
      break;
    case 7:
      json = province_7;
      break;
    default:
      json = "";
      break;
  }
  // provinceMap.removeLayer(stateGeoJson);

  stateGeoJson = L.geoJson(json, {
    style: style,
    onEachFeature: onEachFeature,
  }).addTo(provinceMap);

  // provinceMap.removeLayer(stateGeoJson);

  stateGeoJson.eachLayer(function (layer) {
    layer
      .bindTooltip(layer.feature.properties.DISTRICT, {
        permanent: true,
        direction: "center",
      })
      .openTooltip();
  });
}

function onEachFeature(feature, layer) {
  layer.on({
    // mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToProvince,
  });
}


let projects;
let filteredProjects = [];

// Function to generate dynamic coordinates
async function generateDynamicCoordinates() {
    try {
        const response = await fetch('/get-project-details');
        projects = await response.json();

        return projects.map((project) => ({
            coordinates: [parseFloat(project.latitude), parseFloat(project.longitude)],
            name: project.project_name,
            summary: project.summary,
            companyIcon: project.companies.length > 0 ? project.companies[0].icon : 'default-company-icon',
            financeIcon: project.international_finances.length > 0 ? project.international_finances[0].fin_icon : 'default-international_finances-icon',
        }));
    } catch (error) {
        console.error('Error fetching project details:', error);
        return [];
    }
}

// Function to create a custom icon
function createCustomIcon(companyColor, financeIconClass) {
    return L.divIcon({
        className: 'custom-icon',
        html: `<i class="${financeIconClass}" style="color: ${companyColor}; font-size: 24px;"></i>`,
    });
}

// Function to create a marker and popup
function createMarkerAndPopup(coordinates, customIcon, projectName, projectSummary, index) {
    const marker = L.marker(coordinates, { icon: customIcon }).addTo(provinceMap);

    marker.bindPopup(`
        <h4 class="p-3 font-semibold text-1xl bg-green">${projectName}</h4>
        <div class="lg:p-10 p-5">
            <p>${projectSummary}</p>
            <a class="red_more" href="#" onclick="showSidebars(${index}, true)">See More</a>
        </div>
    `);
}

// Function to initialize filter events
function initializeFilterEvents() {
    const companyCheckboxes = document.querySelectorAll('.company-checkbox');
    const financeCheckboxes = document.querySelectorAll('.finance-checkbox');

    const updateFilters = () => {
        applyFilters();
    };

    // Attach change event to company checkboxes
    companyCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', updateFilters);
    });

    // Attach change event to finance checkboxes
    financeCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', updateFilters);
    });
}

// Function to apply filters
function applyFilters() {
    const selectedCompanies = getSelectedValues('.company-checkbox');
    const selectedFinances = getSelectedValues('.finance-checkbox');

    // Update the global filteredProjects variable
    filteredProjects = projects.filter((project) => {
        const companyIds = project.companies.map((company) => company.id.toString());
        const financeIds = project.international_finances.map((finance) => finance.id.toString());

        return (
            (selectedCompanies.length === 0 || selectedCompanies.some((id) => companyIds.includes(id))) &&
            (selectedFinances.length === 0 || selectedFinances.some((id) => financeIds.includes(id)))
        );
    });

    // Clear existing markers on the map
    clearMapMarkers();
       if (selectedCompanies.length === 0 && selectedFinances.length === 0) {
        // If no checkboxes are selected, reset the map to default view
        generateDynamicCoordinates().then((coordinates) => {
            coordinates.forEach((project, i) => {
                const customIcon = createCustomIcon(project.companyIcon, project.financeIcon);
                createMarkerAndPopup(project.coordinates, customIcon, project.name, project.summary, i);
            });
        });
    } else {

    // Display filtered projects on the map
    filteredProjects.forEach((filteredProject, i) => {
        const projectCoordinates = [parseFloat(filteredProject.latitude), parseFloat(filteredProject.longitude)];

        // Get the first selected company and finance (if available)
        const selectedCompany = selectedCompanies.length > 0 ? selectedCompanies[0] : null;
        const selectedFinance = selectedFinances.length > 0 ? selectedFinances[0] : null;

        // Find the corresponding company and finance for the project
        const projectCompany = filteredProject.companies.find((company) => company.id.toString() === selectedCompany);
        const projectFinance = filteredProject.international_finances.find((finance) => finance.id.toString() === selectedFinance);

        // Use the project's default icons if not found, otherwise use the selected icons
        const companyIconClass = projectCompany ? projectCompany.icon : 'default-company-icon';
        const financeIconClass = projectFinance ? projectFinance.fin_icon : 'default-international-finances-icon';

        const customIcon = L.divIcon({
            className: 'custom-icon',
            html: `<i class="${financeIconClass}" style="color: ${companyIconClass}; font-size: 24px;"></i>`,
        });

        const marker = L.marker(projectCoordinates, {
            icon: customIcon,
        }).addTo(provinceMap);

        marker.bindPopup(`
            <h4 class="p-3 font-semibold text-1xl bg-green">${filteredProject.project_name}</h4>
            <div class="lg:p-10 p-5">
                <p>${filteredProject.summary}</p>
                <a class="red_more" href="#" onclick="showSidebar(${i}, true)">See More</a>
            </div>
        `);
    });
}
}
// Function to get selected checkbox values
function getSelectedValues(className) {
    const checkboxes = document.querySelectorAll(className);
    const selectedValues = Array.from(checkboxes)
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => checkbox.value);
    return selectedValues;
}

// Function to clear map markers
function clearMapMarkers() {
    provinceMap.eachLayer((layer) => {
        if (layer instanceof L.Marker) {
            provinceMap.removeLayer(layer);
        }
    });
}

// Function to update suggestion list
function updateSuggestionList(searchResults) {
    const suggestionList = document.getElementById('suggestion-list');
    suggestionList.innerHTML = '';

    searchResults.forEach((project, i) => {
        const suggestionItem = document.createElement('div');
        suggestionItem.className = 'suggestion-item';

        suggestionItem.innerHTML = `
            <div>
                <p class="suggestion-name">${project.project_name}</p>
            </div>
        `;

    suggestionItem.addEventListener('click', async () => {
    const projectCoordinates = [parseFloat(project.latitude), parseFloat(project.longitude)];

    // Zoom to the project location on the map
    provinceMap.setView(projectCoordinates, 10);

    // Create a custom popup and open it
    const customIcon = createCustomIcon(project.companyIcon, project.financeIcon);
    const popupContent = `
        <h4 class="p-3 font-semibold text-1xl bg-green">${project.project_name}</h4>
        <div class="lg:p-10 p-5">
            <p>${project.summary}</p>

        </div>
    `;

    const marker = L.marker(projectCoordinates, { icon: customIcon }).addTo(provinceMap);
    marker.bindPopup(popupContent).openPopup();

    // Update the sidebar with the correct project details
    const projectIndex = projects.findIndex((proj) => proj.project_name === project.project_name);
    if (projectIndex !== -1) {
        showSidebars(projectIndex, true);
    }
});

        suggestionList.appendChild(suggestionItem);
    });
}


// Function to display search results
async function displaySearchResults() {
    const searchTerm = document.getElementById('search_text').value;
    const searchResults = await searchProjects(searchTerm);

    clearMapMarkers();
    updateSuggestionList(searchResults);
    

    searchResults.forEach((project, i) => {
        const projectCoordinates = [parseFloat(project.latitude), parseFloat(project.longitude)];
        const companyIconClass = project.companies.length > 0 ? project.companies[0].icon : 'default-company-icon';
        const financeIconClass = project.international_finances.length > 0 ? project.international_finances[0].fin_icon : 'default-international_finances-icon';

        const customIcon = createCustomIcon(companyIconClass, financeIconClass);
        createMarkerAndPopup(projectCoordinates, customIcon, project.project_name, project.summary, i);

        // Add a click event for "See More" in the popup
        const marker = provinceMap.getLayers()[i];  // Retrieve the marker from the map
        marker.on('click', () => showSidebars(i, true));
    });
}



// Function to search projects
async function searchProjects(searchTerm) {
    try {
        const response = await fetch(`/search-projects?search=${searchTerm}`);
        return await response.json();
    } catch (error) {
        console.error('Error searching projects:', error);
        return [];
    }
}

function handleOutsideClick(event) {
    const suggestionList = document.getElementById('suggestion-list');
    const searchInput = document.getElementById('search_text');
    const mapContainer = document.getElementById('map');
    const sidebar = document.getElementById('sidebar');

    const isSuggestionList = event.target.closest('#suggestion-list');
    const isSearchInput = event.target.closest('#search_text');
    const isMapContainer = event.target.closest('#map');
    const isSidebar = event.target.closest('#sidebar');

    // Check if the clicked element is outside the suggestion box, search input, map, and sidebar
    if (!isSuggestionList && !isSearchInput && !isMapContainer && !isSidebar) {
        suggestionList.innerHTML = '';
        searchInput.value = '';
        clearMapMarkers();

        // Generate dynamic coordinates and display markers on the map
        generateDynamicCoordinates().then((coordinates) => {
            if (coordinates.length > 0) {
                // Set the map view to the first project's coordinates
                const defaultCoordinates = coordinates[0].coordinates;
                provinceMap.setView(defaultCoordinates, 8);

                // Display markers on the map
                coordinates.forEach((project, i) => {
                    const customIcon = createCustomIcon(project.companyIcon, project.financeIcon);
                    createMarkerAndPopup(project.coordinates, customIcon, project.name, project.summary, i);
                });

                // Update filters after resetting the map
                applyFilters();
            }
        });

        // Hide the sidebar
        closeSidebar();
    }
}

// Function to show sidebar
function showSidebar(index, fromButton = false) {
    const project = filteredProjects[index];
    const sidebarContent = generateSidebarContent(project);
    toggleSidebarVisibility(sidebarContent, fromButton);
    var accordions = document.querySelectorAll(".accordion-title");
    accordions.forEach(function (accordion) {
        accordion.addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
}

function showSidebars(index, fromButton = false) {
    const project = projects[index];
    const sidebarContent = generateSidebarContent(project);
    toggleSidebarVisibility(sidebarContent, fromButton);
    var accordions = document.querySelectorAll(".accordion-title");
    accordions.forEach(function (accordion) {
        accordion.addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
}


function generateSidebarContent(project) {
    const companyNames = getCompanyNames(project.companies);
    const financeNames = getFinanceNames(project.international_finances);

    return `
        <button id="closeSidebar"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        <button id="showSidebar" style="display: none;"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        <div class="sidebar_div">
            <h1 class="text-2xl font-semibold mb-4 px-4">${project.project_name} Details</h1>
            <table class="min-w-full bg-white custom_table">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Category</th>
                        <th class="py-2 px-4 border-b text-left">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b">Location</td>
                        <td class="py-2 px-4 border-b">${project.location}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">Budget</td>
                        <td class="py-2 px-4 border-b">${project.budget}</td>
                    </tr>
                    <!-- Add more rows for other details as needed -->
                    <tr>
                        <td class="py-2 px-4 border-b">Company Name / State Enterprises</td>
                        <td class="py-2 px-4 border-b">${companyNames}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">Relevant government actors</td>
                        <td class="py-2 px-4 border-b">${project.government_actors}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">International Financiers</td>
                        <td class="py-2 px-4 border-b">${financeNames}</td>
                    </tr>
                    <!-- Add more rows for other details as needed -->
                </tbody>
            </table>
            <!-- Add the accordion content here -->
            ${generateAccordionContent(project)}
        </div>
    `;
}

function generateAccordionContent(project) {
    return `
        <div class="accordion">
            <h2 class="accordion-title" onclick="toggleAccordion(this)">
                <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                ${project.project_name}
            </h2>
            <div class="accordion-content">
                <h4 class="font-semibold text-1xl mb-1 lg:pt-6 pt-3 lg:pl-6 pl-3">Description</h4>
                <p class="pl-6">${project.description}</p>
            </div>
        </div>
            <div class="accordion">
      <h2 class="accordion-title" onclick="toggleAccordion(this)">
      <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
      Project Impacts
        
      </h2>
      <div class="accordion-content">
      
        <p class="lg:pt-5 pt-2 lg:pl-6 pl-3">${project.impacts}</p>
      </div>
  
  
   
    </div>
  
  
    <div class="accordion">
    <h2 class="accordion-title" onclick="toggleAccordion(this)">
    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
    Advocacies Undertaken
      
    </h2>
    <div class="accordion-content">
    
    <p class="lg:pt-5 pt-2 lg:pl-6 pl-3">${project.advocacies_undertaken}</p>
    </div>
  
  
  
  </div>
  
  <div class="accordion">
    <h2 class="accordion-title" onclick="toggleAccordion(this)">
    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
      Rights Violated
      
    </h2>
    <div class="accordion-content">
    <p class="lg:pt-5 pt-2 lg:pl-6 pl-3">
    ${project.rights}</p>
    </div>
  </div>
  <div class="accordion">
    <h2 class="accordion-title" onclick="toggleAccordion(this)">
    <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
    Relevant Links
      
    </h2>
    <div class="accordion-content">
    <ul class="mt-6 pl-8">
    ${project.relevant_link}
  </ul>
    </div>
  </div>
  
  </div>
      </div>
    `;
}

function toggleAccordion(accordionTitle) {
    const content = accordionTitle.nextElementSibling;

    accordionTitle.classList.toggle("active");

    if (content.style.display === "block") {
        content.style.display = "none";
    } else {
        content.style.display = "block";
    }
}


function getCompanyNames(companies) {
    if (!companies || companies.length === 0) {
        return 'N/A';
    }

    // Assuming 'company_name' is the property in each company object
    return companies.map((company) => company.company_name).join(', ');
}

// Function to get finance names
function getFinanceNames(international_finances) {
    if (!international_finances || international_finances.length === 0) {
        return 'N/A';
    }

    return international_finances.map((finance) => finance.fin_name).join(', ');
}

// Function to toggle sidebar visibility
function toggleSidebarVisibility(sidebarContent, fromButton) {
    const sidebar = document.getElementById('sidebar');
    sidebar.innerHTML = sidebarContent;

    if (fromButton) {
        const width = window.innerWidth >= 768 ? '550px' : '338px';
        sidebar.style.width = width;
        document.getElementById('map').style.paddingRight = width;
    }

    document.getElementById('closeSidebar').addEventListener('click', () => closeSidebar());
    document.getElementById('showSidebar').addEventListener('click', () => showSidebarButton());
}

// Function to close sidebar
function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.style.width = '0';
    document.getElementById('showSidebar').style.display = 'inline-block';
    document.getElementById('closeSidebar').style.display = 'none';
    document.getElementById('map').style.paddingRight = '0';
}

// Function to show sidebar button
function showSidebarButton() {
    const sidebar = document.getElementById('sidebar');
    const width = window.innerWidth >= 768 ? '550px' : '338px';
    sidebar.style.width = width;
    document.getElementById('showSidebar').style.display = 'none';
    document.getElementById('closeSidebar').style.display = 'inline-block';
    document.getElementById('map').style.paddingRight = width;
}

// Function to set up filter events
initializeFilterEvents();

// Function to display search results on input change
document.getElementById('search_text').addEventListener('input', displaySearchResults);

// Initial call to generate dynamic coordinates and display markers on the map
generateDynamicCoordinates().then((coordinates) => {
    coordinates.forEach((project, i) => {
        const customIcon = createCustomIcon(project.companyIcon, project.financeIcon);
        createMarkerAndPopup(project.coordinates, customIcon, project.name, project.summary, i);
    });
});


document.body.addEventListener('click', handleOutsideClick);

