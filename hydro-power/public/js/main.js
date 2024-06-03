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

  // Define geological and satellite layers
  var geologicalLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
  });
  
  var satelliteLayer =  L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
      attribution: 'Map data © <a href="https://google.com">Google</a> contributors',
  });
  
  satelliteLayer.on('tileerror', function(error) {
    console.log('Tile load error: ', error);
    provinceMap.addLayer(geologicalLayer); // Fallback to geological layer
});

  
  // Add layers to the map
  var baseMaps = {
      "Geological": geologicalLayer,
      "Satellite": satelliteLayer
  };
  
  // Initialize map with one of the layers
  var provinceMap = L.map("map", {
      layers: [geologicalLayer],
      scrollWheelZoom: true,
      touchZoom: false,
      doubleClickZoom: false,
      zoomControl: true,
      dragging: true
  }).setView([28.3949, 84.124], 8);
  
  // Add layer control
  L.control.layers(baseMaps).addTo(provinceMap);
  
  provinceMap.on('baselayerchange', function(e) {
      provinceMap.invalidateSize();
  });
  
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
          color: 0,
          dashArray: "1",
          fillOpacity: 0.1,
          fillColor: 0,
      };
  }
  
  function highlightFeature(e) {
      var layer = e.target;
      layer.setStyle({
          weight: 2,
          color: 0,
          dashArray: "",
          fillOpacity: 0.7,
          fillColor: 0,
      });
  
      if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
          layer.bringToFront();
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
  
      stateGeoJson = L.geoJson(json, {
          style: style,
          onEachFeature: onEachFeature,
      }).addTo(provinceMap);
  
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
let markers = []; // Array to keep track of markers

async function generateDynamicCoordinates() {
    try {
        const response = await fetch('/get-project-details');
        projects = await response.json();

        return projects.map((project) => ({
            coordinates: [parseFloat(project.latitude), parseFloat(project.longitude)],
            name: project.project_name,
            summary: project.summary,
            projectIcon: project.icon ? `/uploads/iconsproject/${project.icon}` : 'default-project-icon', // Provide default icon path
        }));
    } catch (error) {
        console.error('Error fetching project details:', error);
        return [];
    }
}
let isSatelliteLayerActive = false;
function createCustomIcon(projectIconClass) {
    let iconHtml = `
    <div id="icon-img" class="${isSatelliteLayerActive ? 'icons' : ''}">
        <img src="${projectIconClass}">
    </div>
    `;

    return L.divIcon({
        className: 'custom-icon',
        html: iconHtml,
    });
}

function createMarkerAndPopup(coordinates, customIcon, projectName, projectSummary, index) {
    const marker = L.marker(coordinates, { icon: customIcon }).addTo(provinceMap);
    markers.push(marker);

    marker.bindPopup(`
        <h4 class="p-3 font-semibold text-1xl bg-green">${projectName}</h4>
        <div class="lg:p-10 p-5">
            <p>${projectSummary}</p>
            <a class="red_more" href="#" onclick="showSidebars(${index}, true)">See More</a>
        </div>
    `);

    marker.on('click', () => {
        provinceMap.setView(coordinates, 10);
    });
}

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
                const customIcon = createCustomIcon(project.projectIcon);
                createMarkerAndPopup(project.coordinates, customIcon, project.name, project.summary, i);
            });
        });
    } else {
    
        filteredProjects.forEach((filteredProject, i) => {
            const projectCoordinates = [parseFloat(filteredProject.latitude), parseFloat(filteredProject.longitude)];
            const projectIconClass = filteredProject.icon ? `/uploads/iconsproject/${filteredProject.icon}` : 'default-project-icon';
            const customIcon = createCustomIcon(projectIconClass);

            createMarkerAndPopup(projectCoordinates, customIcon, filteredProject.project_name, filteredProject.summary, i);
        });
    }
}

function getSelectedValues(className) {
    const checkboxes = document.querySelectorAll(className);
    const selectedValues = Array.from(checkboxes)
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => checkbox.value);
    return selectedValues;
}

// Function to clear map markers
function clearMapMarkers() {
    markers.forEach((marker) => provinceMap.removeLayer(marker));
    markers = []; // Reset the markers array
}

  


  // Function to update suggestion list
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
                    <a class="red_more" href="#" onclick="showSidebar(${i}, true)">See More</a>
                </div>
            `;

            const marker = L.marker(projectCoordinates, { icon: customIcon }).addTo(provinceMap);
            marker.bindPopup(popupContent).openPopup();

            // Update the sidebar with the correct project details
            const projectIndex = projects.findIndex((proj) => proj.project_name === project.project_name);
            if (projectIndex !== -1) {
                showSidebars(projectIndex, true);
            }

            // Clear the suggestion list and search input
            suggestionList.innerHTML = '';
            document.getElementById('search_text').value = '';
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
          const financeIconClass = project.international_finances.length > 0 ? project.international_finances[0].fin_icon : 'default-international-finances-icon';
  
          const customIcon = createCustomIcon(companyIconClass, financeIconClass);
          createMarkerAndPopup(projectCoordinates, customIcon, project.project_name, project.summary, i);
  
          // Add a click event for "See More" in the popup
          const marker = markers[i]; // Retrieve the marker from the markers array
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
      if (!suggestionList.contains(event.target) && event.target !== searchInput) {
          suggestionList.innerHTML = '';
      }
  }

  function toggleSatelliteLayer() {
    // Remove geological layer and add satellite layer
    provinceMap.removeLayer(geologicalLayer);
    provinceMap.addLayer(satelliteLayer);

    isSatelliteLayerActive = true;
}

function toggleGeologicalLayer() {
    provinceMap.removeLayer(satelliteLayer);
    provinceMap.addLayer(geologicalLayer);
    isSatelliteLayerActive = false;

  
}

  // Initialize the application
  async function init() {
      const coordinates = await generateDynamicCoordinates();
      coordinates.forEach((project, i) => {
          const customIcon = createCustomIcon(project.projectIcon);
          createMarkerAndPopup(project.coordinates, customIcon, project.name, project.summary, i);
      });
  
      initializeFilterEvents();
  
      document.getElementById('search_text').addEventListener('input', displaySearchResults);
      document.addEventListener('click', handleOutsideClick);
  }
  
  // Start the initialization
  init();
  


  
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
Advoacies Organizations
      
    </h2>
    <div class="accordion-content">
    <ul class="mt-6 pl-8">
    ${project.advocacy_org}
  </ul>
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
  
  async function initializeMap() {
    provinceMap = L.map('map').setView([51.505, -0.09], 8);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(provinceMap);

    // Generate dynamic coordinates and display markers on the map
    const coordinates = await generateDynamicCoordinates();
    if (coordinates.length > 0) {
        // Set the map view to the first project's coordinates
        const defaultCoordinates = coordinates[0].coordinates;
        provinceMap.setView(defaultCoordinates, 8);

        // Display markers on the map
        coordinates.forEach((project, i) => {
            const customIcon = createCustomIcon(project.projectIcon);
            createMarkerAndPopup(project.coordinates, customIcon, project.name, project.summary, i);
        });
    }

    // Initialize filter events and apply initial filters
    initializeFilterEvents();
    applyFilters();
}

// Add event listeners for search and outside click
document.getElementById('search_text').addEventListener('input', displaySearchResults);
document.addEventListener('click', handleOutsideClick);



function toggleSection(containerId, sectionId) {
  var container = document.getElementById(containerId);
  var section = document.getElementById(sectionId);
  var chevronIcon = container.querySelector('.fas.fa-chevron-down');
  if (section.classList.contains('hidden')) {
      section.classList.remove('hidden');
      container.classList.remove('collapsed');
      container.classList.add('expanded');
      chevronIcon.classList.add('fa-chevron-up');
      chevronIcon.classList.remove('fa-chevron-down');
  } else {
      section.classList.add('hidden');
      container.classList.remove('expanded');
      container.classList.add('collapsed');
      chevronIcon.classList.remove('fa-chevron-up');
      chevronIcon.classList.add('fa-chevron-down');
  }
}
