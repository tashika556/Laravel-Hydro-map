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

  // Attach event listeners to the buttons
  showFilterButton.addEventListener("click", showFilter);
  closeFilterButton.addEventListener("click", hideFilter);
});
// filter end

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
      return "blue";
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

/**
 **  generatefixed coordinates
 **/

function generateFixedCoordinates() {
  // Use fixed coordinates with names and descriptions
  return [
    {
      coordinates: [28.6351973, 84.0869572],
      name: "Marsayandi Corridor Transmission Line Project",
      description:
        "The project is located along the Marsayandi Corridor, mainly in <a href='https://spcommreports.ohchr.org/TMResultsBase/DownLoadPublicCommunicationFile?gId=27256'>Lamjung and Manang, Western Nepal</a>. The transmission line is planned to be built specifically in villages such as the Bajhakhet village. The 220 kV transmission lines are designed to supply electricity generated from Marsyangdi  ...",
    },
    {
      coordinates: [27.2456191, 86.1540337],
      name: "Sunkoshi-2 Hydropower Project",
      description:
        "Sunkoshi-II is a reservoir-based project that constitutes one component of a wider Sunkoshi Marin Diversion Multi-Purpose <a href='https://www.researchgate.net/publication/359159134_Simulation_of_Trade-Off_among_Planned_Reservoir_Projects_and_Inter-Basin_Transfer_Project_A_Case_Study_of_Sunkoshi_River_in_Koshi_Basin_Nepal'>Project</a>.",
    },
    {
      coordinates: [27.4538771, 85.8115658],
      name: "Sunkoshi-3 Hydropower Project",
      description:
        "The Sunkoshi III Storage Hydropower Project is a proposed storage dam that will be located at Temal Rural Municipality-9 of Kavre and Khandevi Rural Municipality. The Kavre district is home to Tamang Indigenous communities.",
    },
    {
      coordinates: [27.3494183, 85.9831174],
      name: "Sunkoshi Marin Diversion Multipurpose Project",
      description:
        "Sunkoshi Marine Diversion multi-purpose project is being built by the Government of Nepal as a project of national pride with the objective of irrigating 1,22,000 hectares of land in 5 districts including Bara, Rautahat...",
    },
    {
      coordinates: [27.9632942, 84.276782],
      name: "Tanahu Hydropower Project",
      description:
        "The Tanahu Hydropower Project is a storage type hydropower project with an installed capacity of 140 MW and an estimated average annual energy generation of 587.7 GWh (years 1-10) and 489.9 GWh (year 11 onwards).",
    },
    {
      coordinates: [27.6487496, 85.2900386],
      name: "Thankot-Chapagaun-Bhaktapur 132 kV Transmission Line",
      description:
        "The Thankot-Bhaktapur transmission line is designed to bring power into the Kathmandu valley, to prevent power outages, in anticipation of a drastic increase in energy demand by 2050. ",
    },
    {
      coordinates: [27.921284, 85.146087],
      name: "Upper Trishuli-1 Hydroelectric Project",
      description:
        "The Upper Trishuli-1 Hydropower project is a run-of-river project being developed along the Upper Trishuli River, in the Rasuwa district of Nepal. The Upper part of the Trishuli watershed is the ancestral homeland of the Tamang people. ",
    },
    {
      coordinates: [27.6667, 86.0333],
      name: "Tamakoshi-Kathmandu Transmission Line",
      description:
        "The Tamakoshi-Kathmandu (T-K) Transmission Line is an important electrical transmission line in Nepal designed to transmit electricity generated from the Tamakoshi Hydropower Project, to the Kathmandu Valley, which is the country’s ...",
    },
    {
      coordinates: [27.4434806668, 86.2579654665],
      name: "Likhu-IV",
      description:
        "The Likhu-IV Hydroelectric Project is a run of the river scheme that is being built along the freshwater Likhu River, which runs through the Ramechhap, Okhaldhunga and Solukhumbu districts. The project is therefore located chiefly...",
    },
    {
      coordinates: [27.9309417, 83.6150944],
      name: "Kali Gandaki Hydroelectric Project",
      description:
        "The KGHP is a run of the river project that began in 1997. Initially, the project was financed by the Asian Development Bank, the Japanese Bank for International Cooperation, the United Nations Development Program, and the Finish Development Agency. ",
    },
    {
      coordinates: [27.6996, 84.434],
      name: "Bharatpur-Bardaghat 220 KV Transmission Line",
      description:
        "This case concerns the construction of the transmission line between Hetauda-Bharatpur and Bharatpur-Bardaghat. It crosses the border between India and Nepal, in order to <a href='https://www.lahurnip.org/world-bank-financed-220-kv-transmission-line-project'>",
    },
    {
      coordinates: [26.95 - 27.4888, 85.8 - 86.1071],
      name: "Khimti-Dhalkebar 220 KV Transmission Line",
      description:
        "The Nepal Electricity Authority project, the 220kV Power Transmission Line runs from ...",
    },
    {
      coordinates: [27.5104505, 87.1940982],
      name: "Arun III",
      description:
        "The Arun III is a controversial project that was initially identified by JICA in 1987, and a pre-feasibility study was carried out at that time. Despite the potential the project had, it was protested almost immediately. The project was taken over by the Nepali Congress in 1991, was redesigned in 1992 as a two-stage project, and ",
    },
    {
      coordinates: [27.3824, 87.2],
      name: "Upper Arun",
      description:
        "The <a href='http://uahel.com.np/project/1/projectDescription'>Upper Arun Hydro Electric Project</a> is a run of river type project on the upper reach of the Arun River.  The dam site will be close to the Chepuwa village, with the powerhouse being located at Chhongryang, and building of these sights is forecasted to begin in December 2023. ",
    },
    {
      coordinates: [27.0838404, 85.3428859],
      name: "Hetauda-Dhalkebar-Inaruwa transmission line",
      description:
        "The <a href='https://www.nea.org.np/admin/assets/uploads/supportive_docs/12305842.pdf'>Hetauda-Dhalkebar-Inaruwa 400 KV Transmission Line</a> designed to initially import energy from India into Nepal.  The transmission line is 288.km long, and <a href='https://www.nea.org.np/admin/assets/uploads/supportive_docs/47580641.pdf'>initial plans</a> ",
    },
    {
      coordinates: [28.92306, 81.47222],
      name: "Upper Karnali Hydropower Project",
      description:
        "The Upper Karnali hydropower project is a run of the river project <a href='https://ibn.gov.np/projects/details/upper-karnali-hydropower-3835'>currently in the process of development</a> on the Karnali River.  The site spans three districts, Surkhet, Achham and Dailekh. Once completed, the project is predicted to include a gravity dam, headrace tunnels, a fish pass...",
    },
    {
      coordinates: [27.4442, 85.3033],
      name: "Lapsiphedi-Ratmate transmission line (MCC)",
      description:
        "The Lapsiphedi-Ratmate Lapsephedi is a transmission line that will be located in the Lapsophedi (Bojheni) region.  Specifically, it will run from Lapsiphedi, in Northeastern Kathmandu, to Ratmate in Nuwakot.  This project is part of a wider scheme funded by the US aid Millenium Challenge Corporation...",
    },
    {
      coordinates: [28.3516, 81.72109],
      name: "Bheri-Babai diversion project",
      description:
        "The Bheri Babai Project was listed as a National Pride project by the Government of Nepal in 2011.  It is a multipurpose project, consisting of Hydropower and Irrigation components.   It is in Chiple, Bheriganga Municipality, Surkhet, and includes a tunnel bored through the Siwaliks...",
    },
  ];
}

// Create circle markers using the fixed coordinates
var fixedCoordinates = generateFixedCoordinates();
// ...
for (var i = 0; i < fixedCoordinates.length; i++) {
  var circleMarker = L.circle(fixedCoordinates[i].coordinates, {
    color: "white",
    fillColor: "green",
    fillOpacity: 0.5,
    radius: 5000, // Adjust the radius as needed
  }).addTo(provinceMap);

  // Add a popup with HTML content to each circle marker
  circleMarker.bindPopup(`
      <h4 class="p-3 font-semibold text-1xl bg-green">${fixedCoordinates[i].name}</h4>
      <div class="lg:p-10 p-5">
        <p>${fixedCoordinates[i].description}</p>
        <a class="red_more" href="#" onclick="showSidebar(${i}, true)">See More</a>
  
      </div>
    `);
}

// Function to show the sidebar with detailed information

function showSidebar(index, fromButton = false) {
  var sidebarContent = `
    <button id="closeSidebar"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    <button id="showSidebar" style="display: none;"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    <div class="sidebar_div">
  
    <h1 class="text-2xl font-semibold mb-4 px-4">Kali Gandaki Hydroelectric  Details</h1>
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
        <td class="py-2 px-4 border-b">Kali Gandaki River</td>
      </tr>
      <tr>
        <td class="py-2 px-4 border-b">Budget</td>
        <td class="py-2 px-4 border-b">$420 million, Amendment project $4,852,394</td>
      </tr>
      <tr>
        <td class="py-2 px-4 border-b">Affected Communities</td>
        <td class="py-2 px-4 border-b">Brahmin, Magar, Newar, Sunar, Chhetri and Bota</td>
      </tr>
      <tr>
        <td class="py-2 px-4 border-b">Start of Conflict</td>
        <td class="py-2 px-4 border-b">1997</td>
      </tr>
      <tr>
        <td class="py-2 px-4 border-b">Company name/state enterprises</td>
        <td class="py-2 px-4 border-b">[Enter Company Name]</td>
      </tr>
      <tr>
        <td class="py-2 px-4 border-b">Relevant government actors</td>
        <td class="py-2 px-4 border-b">[Enter Relevant Government Actors]</td>
      </tr>
      <tr>
        <td class="py-2 px-4 border-b">International Financiers</td>
        <td class="py-2 px-4 border-b">[Enter International Financiers]</td>
      </tr>
    </tbody>
  </table>
  
  
         <div class="accordion">
         
  
  
          <h2 class="accordion-title">
          <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
          Kali Gandaki Hydroelectric Project
            
          </h2>
          <div class="accordion-content">
             <h4 class="font-semibold text-1xl mb-1 lg:pt-6 pt-3 lg:pl-6 pl-3">Description</h4>
             <p class="pl-6">The KGHP is a run of the river project that began in 1997. Initially, the project was financed by the Asian Development Bank, the Japanese Bank for International Cooperation, the United Nations Development Program, and the Finish Development Agency. This massive construction, worth an estimated <a href="https://ejatlas.org/print/kali-gandaki-hydroelectric-project-a-nepal">$420million</a> at the time of construction, was carried out by the NEA, alongside Impregilo S.p.a. Due to the timing of the project, Nepal was not part of any international treaty concerning indigenous rights, such as the ILO, however there were Nepalese <a href="https://www.fao.org/3/Y3994E/y3994e0y.htm">regulations</a> that required an Environmental Impact Assessment.   The area in question where this project was located is along the Kali Gandakhi river, with the Dam being located below the Kali Gandhaki and Andhi Khloa rivers. The project is present in the Syangia, Gulmi, Palpa and Parbat districts. The main facility area was <a href="https://documents1.worldbank.org/curated/en/559221468058761696/pdf/IPP6180v10P1320IC0disclosed02050130.pdf">home</a> to Brahmin, Magar, Newar and Sunar communities, whilst along the transmission lines and substation areas, there were Chhetri, Magar, Newar, Bote and Dalit communities.  According to the <a href="https://www.fao.org/3/Y3994E/y3994e0y.htm">EIA</a>, the livelihoods of many within these communities depended on the fishing of native species such as snowtrout and mahseer fish. Due to lack of financial and social support, building came to a halt in the early 2000s, however, the World Bank further funded the project in 2017, to fix issues for example sedimentary buildup, and improve the project status so that it was fit to run effectively, loaning funds of <a href="https://documents1.worldbank.org/curated/en/682981515169371264/pdf/Implementation-Completion-and-Results-Report-ICR-Document-P132289-2017-12-28-10-31-002-01022018.pdf">$4,852,394</a>.  the project has therefore been ongoing for nearly two decades, and whilst there have been signs of FPIC and compensation for indigenous groups, there are indications that those communities have also been disadvantaged throughout the construction of the project.</p>
          </div>
  
        
         
        </div>
  
        <div class="accordion">
          <h2 class="accordion-title">
          <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
          Project Impacts
            
          </h2>
          <div class="accordion-content">
          
            <p class="lg:pt-5 pt-2 lg:pl-6 pl-3">The Kali Gandaki River is considered to be one of the most sacred in Nepal, as such, many communities
            have many ceremonial and cultural ties to the river, for example using it to embalm their dead.
            Furthermore, many communities, in particular, the Bote community, have historically relied on the river
            and its natural functioning for their livelihoods. The lack of access to the river, and the rerouting of
            some parts of the river has meant that they have lost their traditional occupations. 12 villages have
            been directly affected by the project, encompassing 1,468 families, 17 of which were Bote families, and
            2 of which were Magar families. These families have experienced land loss, displacement, reduction in
            ownership of assets, degrading professions and loss of income. Furthermore, arguments have been made
            suggesting that the impacts of the project could be felt outside the boundaries of the project ground
            itself, and that downstream sites such as Chitwan National Park may also be negatively impacted from the
            water diversion. There is much evidence to at least indicate that residents affected by the project were
            granted a higher rate of compensation than average communities affected by NEA projects in Nepal.
            However, out of a sample survey conducted by the World Bank, there is evidence to suggest that not all
            compensation was adequately provided, with only half of the sample indicating satisfaction with the
            project implementation, and 20/126 surveyed households stated that they did not receive compensation.
            Furthermore, of the families that did receive compensation, concerns have been raised that with the loss
            of livelihoods the money will not be enough to help them integrate into a wider capitalist society. Due
            to the timing of the initial project, the concept of FPIC was not widely circulated, and so there is
            little to indicate whether it was obtained, and whether public consultation was carried out. However,
            there is much evidence that indicates that relocation efforts were carried out (though some communities
            were relocated to unsatisfactory or unsafe locations), as well as the installation of medical centers,
            clean water, and schools, and finally, employment efforts for the communities affected were also put in
            place. This indicates burden sharing and consultation. With the proposals to fix and update the project
            put forward in 2013, a full impact assessment was carried out, and according to the World Bank Report, a
            PCPD program was developed and implemented.</p>
          </div>
  
      
       
        </div>
  
        <div class="accordion">
          <h2 class="accordion-title">
          <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
          Advocacies Undertaken
            
          </h2>
          <div class="accordion-content">
          
          <p class="lg:pt-5 pt-2 lg:pl-6 pl-3">There have been noted protests and objections made to both the initial building of the project and the
            amendment project in 2013. There aren’t many articles indicating protests or advocacies undertaken
            during the initial project. This may be because of the weaker legal remedies available at the time,
            however we do know that there were onsite retaliatory protests. We know that there was compensation
            given, and relocation efforts made, and that the building continued. However, the World Bank reports
            from 2013 show the results of public consultation, whereby concerns or failings of the initial project
            were raised regarding issues such as water not being accessible for festive days, not enough land being
            transferred to Bote families, and ineffective siren warning systems. The Project was developed with a
            further community support program to address these issues. This isn’t to say that further protests
            weren’t carried out with the renovations of the project- the Gandai Chief Minister Krishna Chandra
            Nepali warned that the diversion plan could not be allowed to succeed, stating that there would be
            protests is the federal government did not listen to their demands. The Gandaki province called an
            all-party meeting to form a common view on the project with the government. Furthermore, Prakash Mani
            Sharma and others filed a writ petition with the Supreme Court, who issued an interim order against
            carrying out any activity on the river until further decisions were reached.However, in 2023, resumption
            of construction began.</p>
          </div>
  
      
       
        </div>
       
        <div class="accordion">
          <h2 class="accordion-title">
          <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
            Rights Violated
            
          </h2>
          <div class="accordion-content">
          <p class="lg:pt-5 pt-2 lg:pl-6 pl-3">ILO Convention No. 169 (Ratified by Nepal 2007)
            Art 14 (1) mandates recognition of Indigenous Peoples “rights of ownership and possession” over the lands they “traditionally occupy.” This includes “lands not exclusively occupied by them, but to which they have traditionally had access for their subsistence and traditional activities.”
            UN Declaration on the Rights of Indigenous People
            A 23 affirms the right of indigenous peoples “to determine and develop priorities and strategies for exercising their right to development.”
            A28(2) states that  “unless otherwise freely agreed upon by the peoples concerned, compensation shall take the form of lands, territories and resources equal in quality, size and legal status or of monetary compensation or other appropriate redress.”
            Land Acquisition Act 1977
            A7- (1) Compensation shall be paid for losses resulting from clearing of crops and trees, and of demolition of walls, etc., or for damage, if any, suffered as a result of the removal or digging of earth, stone, ditches, or boring</p>
          </div>
       </div>
        <div class="accordion">
          <h2 class="accordion-title">
          <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
          Relevant Links
            
          </h2>
          <div class="accordion-content">
          <ul class="mt-6 pl-8">
          <li><a href="https://ejatlas.org/print/kali-gandaki-hydroelectric-project-a-nepal">EJ Atlas report</a></li>
          <li><a href="https://www.fao.org/3/Y3994E/y3994e0y.htm">FAO report</a></li>
          <li><a href="https://documents1.worldbank.org/curated/en/559221468058761696/pdf/IPP6180v10P1320IC0disclosed02050130.pdf">NEA Project Report</a></li>
          <li><a href="https://documents1.worldbank.org/curated/en/682981515169371264/pdf/Implementation-Completion-and-Results-Report-ICR-Document-P132289-2017-12-28-10-31-002-01022018.pdf">World Bank Report</a></li>
          <li><a href="https://www.academia.edu/65242402/Advantages_of_hydro_generation_Resettlement_of_Indigenous_Bote_Fisherman_families_A_Case_Study_of_Kali_Gandaki_A_Hydroelectric_Project_of_Nepal">Rajendra P. Thanju, Advantages of hydro generation: Resettlement of Indigenous Bote (Fisherman) families: A Case Study of Kali Gandaki "A" Hydroelectric Project of Nepal</a></li>
          <li><a href="https://www.adb.org/sites/default/files/evaluation-document/35901/files/in13-13.pdf">ADB Independent Evaluation Report</a></li>
          <li><a href="https://nepalnews.com/s/nation/gandaki-province-warns-of-protest-in-continual-of-kaligandaki-project">Nepal News Report</a></li>
          <li><a href="https://thehimalayantimes.com/opinion/editorial-scs-stay-order">The Himalayan Times Report</a></li>
          <li><a href="https://risingnepaldaily.com/news/26719">Rising Nepal Daily Report</a></li>
        </ul>
          </div>
       </div>
  
    </div>
  `;
  var sidebar = document.getElementById("sidebar");
  sidebar.innerHTML = sidebarContent;

  // Only adjust width if triggered by the button click
  if (fromButton) {
    // Set initial width based on screen size
    if (window.innerWidth >= 768) {
      sidebar.style.width = "550px"; // Desktop view
    } else {
      sidebar.style.width = "338px"; // Mobile view
    }
    // Add padding if sidebar is shown
    document.getElementById("map").style.paddingRight = sidebar.style.width;
  }

  // Attach event listener to the close button
  document
    .getElementById("closeSidebar")
    .addEventListener("click", function () {
      sidebar.style.width = "0";
      document.getElementById("showSidebar").style.display = "inline-block";
      document.getElementById("closeSidebar").style.display = "none";
      // Remove padding when sidebar is closed
      document.getElementById("map").style.paddingRight = "0";
    });

  // Attach event listener to the show button
  document.getElementById("showSidebar").addEventListener("click", function () {
    sidebar.style.width = window.innerWidth >= 768 ? "550px" : "338px";
    document.getElementById("showSidebar").style.display = "none";
    document.getElementById("closeSidebar").style.display = "inline-block";
    // Add padding when sidebar is shown
    document.getElementById("map").style.paddingRight = sidebar.style.width;
  });

  // Toggle accordion functionality
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

// map end
$(document).ready(function () {
  //jquery for toggle sub menus
  $(".sub-btn").click(function () {
    $(this).next(".sub-menu").slideToggle();
    $(this).find(".dropdown").toggleClass("rotate");
  });

  //jquery for expand and collapse the sidebar
  $(".menu-btn").click(function () {
    $(".side-bar").addClass("active");
    $(".menu-btn").css("visibility", "hidden");
  });

  $(".close-btn").click(function () {
    $(".side-bar").removeClass("active");
    $(".menu-btn").css("visibility", "visible");
  });
});
// menu mobile end
import React, { useState, useEffect } from "react";

const App = () => {
  const [todo, setTodo] = useState([]);
  const [inputValue, setInputValue] = useState("");
  const [editIndex, setEditIndex] = useState(null);
  const [searchQuery, setSearchQuery] = useState("");

  // Load todo items from local storage on component mount
  useEffect(() => {
    const savedTodo = localStorage.getItem("todo");
    if (savedTodo) {
      setTodo(JSON.parse(savedTodo));
    }
  }, []);

  // Save todo items to local storage whenever todo state changes
  useEffect(() => {
    localStorage.setItem("todo", JSON.stringify(todo));
  }, [todo]);

  const inputChange = (e) => {
    setInputValue(e.target.value);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (editIndex !== null) {
      const updateEditItem = [...todo];
      updateEditItem[editIndex] = inputValue;
      setTodo(updateEditItem);
      setEditIndex(null);
    } else {
      if (inputValue.trim() !== "") {
        setTodo([...todo, inputValue]);
      }
    }
    setInputValue("");
  };

  const editItem = (index) => {
    setEditIndex(index);
    setInputValue(todo[index]);
  };

  const removeItem = (index) => {
    const updateRemoveItem = todo.filter((item, i) => i !== index);
    setTodo(updateRemoveItem);
  };

  const handleSearch = (e) => {
    setSearchQuery(e.target.value);
  };

  const filteredTodo = todo.filter((item) =>
    item.toLowerCase().includes(searchQuery.toLowerCase())
  );

  return (
    <>
      <form onSubmit={handleSubmit}>
        <input type="text" value={inputValue} onChange={inputChange} />
        <button> {editIndex !== null ? "edit" : "add"} </button>
      </form>
      <input
        type="text"
        placeholder="Search..."
        value={searchQuery}
        onChange={handleSearch}
      />
      <ul>
        {filteredTodo.map((item, index) => {
          return (
            <li key={index}>
              {item}
              <button onClick={() => editItem(index)}>
                {editIndex === index ? "cancel" : "edit"}
              </button>
              <button onClick={() => removeItem(index)}>remove</button>
            </li>
          );
        })}
      </ul>
    </>
  );
};

export default App;
