<script src="test/script.js"></script>
<script src="assets/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/mixitup.js"></script>
  <script>
    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const sectorSelect = document.getElementById('sector');
    const villageSelect = document.getElementById('village');

    // Define district, sector, and village data for each province
    const provinceData = {
        kigali: {
            districts: {
                Gasabo: ['Jabana', 'Jari', 'Gatsata', 'Bumbogo', 'Kacyiru','Kimihurura','Kinyinya','Ndera','Nduba','Remera','Rusororo','Rutunga'],
                Kicukiro: ['Gahanga', 'Gikondo', 'Kagarama', 'Kanombe', 'Kinyinya', 'Masaka', 'Niboye', 'Nyarugunga', 'Gatenga', 'Kicukiro'],
                Nyarugenge: ['Biryogo', 'Gitega', 'Muhima', 'Nyakabanda', 'Nyamirambo', 'Nyarugenge', 'Rwezamenyo']

                
            },
            sectors: {
                Gatsata: ['Akamatamu','Gako','Kibare','Kigarama','Kinyaga','Murambi','Gikondo','Kigarama','Rugazi','Rukiri','Ruriba','Bweramvura','Gisiza','Kabeza','Kagugu','Kamutwa','Gasenyi','Kabeza','Karuruma','Murehe','Nyagasozi'],
                Bumbogo: ['Gasharu','Mubuga','Nyabikenke','Rubona','Rurenge','Akamatamu','Gisiza','Kabushara','Karuruma','Nyarufunzo','Gatare','Kabuga','Nyarurama','Rugero','Karuruma','Kigarama','Kivugiza','Rukozo','Kabuga','Mbirima','Muko','Nyagasozi','Gikoro','Kamanyana','Kibara','Kigarama','Rubirizi','Gahanga','Kabugondo','Nyabikenke','Nyagatovu'],
                Jali: ['Akabuga', 'Gasagara', '', '', 'Akabahizi', 'Gasogi', 'Kabuye', 'Nyagasozi', 'Nyamirambo','Gatovu', 'Kabacuzi', 'Kamukina', 'Karama', 'Kigarama', 'Kabeza', 'Kabirizi', 'Karambo', 'Kigabiro', 'Rubona'],
                Jabana: ['Gihinga', 'Kabacuzi', 'Kabeza', 'Karuruma', 'Nyarugunga','Akabuga', 'Akarambo', 'Gakiri', 'Gasura', 'Rugarama','Gikomero', 'Kabeza', 'Karuruma', 'Nyamirambo', 'Rugari','Bweramvura', 'Gisiza', 'Kabuye', 'Kamutwa', 'Nyagisozi'],
                Kacyiru: ['Gakiriro', 'Gisiza', 'Kamatamu', 'Kibenga', 'Mubuga','Gatagara', 'Gatare', 'Karuruma', 'Kibuye', 'Nyagasozi','Akabuga', 'Gasura', 'Kavumu', 'Murambi', 'Rugari','Gatovu', 'Kamatamu', 'Karuruma', 'Kavumu', 'Nyakabanda'],
                Kimihurura: ['Gakiriro', 'Gatagara', 'Gasharu', 'Gatare', 'Kigabiro','Gikondo', 'Gisiza', 'Kabuga', 'Karuruma', 'Kimihurura','Gasharu', 'Gasura', 'Gatovu', 'Kabuye', 'Kamabuye','Gatagara', 'Gatare', 'Karuruma', 'Kibuye', 'Nyagasozi'],
                Kinyinya: ['Gatovu', 'Gihara', 'Gisozi', 'Gisyoza', 'Kacyiru','Bwiza', 'Cyivugiza', 'Gatovu', 'Gisozi', 'Kimicanga','Cyivugiza', 'Gatovu', 'Gisozi', 'Kabuga', 'Kinyinya','Burega', 'Cyivugiza', 'Gatovu', 'Kabuga', 'Murama'],
                Ndera: ['Gako', 'Gasura', 'Karuruma', 'Kibenga', 'Mubuga','Gihinga', 'Gitare', 'Kabuga', 'Karuruma', 'Kimihurura','Gisyoza', 'Kabacuzi', 'Kabuga', 'Kacyiru', 'Kibenga','Gatovu', 'Gikomero', 'Kabuga', 'Karuruma', 'Nyarugunga'],
                Nduba: ['Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura'],
                Remera: ['Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura'],
                Rusororo: ['Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura'],
                Rutunga: ['Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura','Gatovu', 'Gihira', 'Kabuga', 'Karuruma', 'Kimihurura'],
               Gahanga: ['gahanga','gatare', 'gatovu', 'karembure', 'kabeza', 'kamiyinga', 'rwamaya','bigo','amahoro','kagasa rugando2', 'nyakuguma', 'kagasa nyacyonga','ubumwe'],
               Nyarugunga:['Akindege', 'Runyonza', 'Rwimbogo'],
                Niboye:['Byimana','Gatare','Imena','Kamahoro','Kigarama','Rugunga','Rurembo','Taba','Buhoro','Gaseke','Gateke','Gorora','Kigabiro','Kinunga','Kiruhura','Munini','Murehe','Mwijabo','Mwijuto','Nyarubande','Rwezamenyo','Sovu','Taba','Amahoro','Amarebe','Amarembo','Bigabiro','Bukinanyana','Bumanzi','Bwiza','Gatsibo','Gikundiro','Indakemwa','Indamutsa','Indatwa','Inyarurembo','Isangano','Karama','Kinyana','Rugwiro','Umurava'],
                Masaka:['Ayabaraya','Bwiza','Rebero','Gitaraga','Mbabe','Cyankongi'],
                Kigarama: ['Bwerankori','Terimbere','Kigarama','Twishorezo','Rwampara'],
                Kicukiro:['Sakirwa','Kagina','Kicukiro','Iriba'],
                Kanombe:['Busanza','Giporoso II','Nyabyunyu','Rubirizi'],
                Kagarama:['Kanserege','Taba','Rukatsa'],
                Gikondo: ['Kabuye I','Kanserege','Ruganwa II'],
                Gahanga: ['Gahanga','Kagasa','Karembure','Murinja','Nunga','Rwabutenge','Nyakuguma','Karembure','Runyoni','Nunga','Rwabutenge'],
Gatenga:['Gatenga','Karambo','Gasabo','Nyarurama'],
Nyarugenge:['Gitega','Nyakabanda', 'Nyarugenge', 'kabuye', 'nyamirambo','Rwampara'],
Muhima:['muhima','nyundo','kabuye', 'gisozi'],

                // Add sectors for other districts
            }
        },

                west: {
            districts: {
                Nyabihu: ['Mukamira', 'Kintobo','Muringa','Jomba','Shyira','Rurembo','Rambura','Karago','Rugera','Jenda','Biongwe','Kabatwwa'],
                Rubavu: ['Bugeshi','Budende','Busasamana','Cyanzarwe','Kanzenze','Rubavu','Gisenyi','Rugerero','Nyakiliba','Kanzeze','Kanama','Nyundo','Nyamyumba'],
                Rusizi: ['Bugarama', 'Butare'],
                Karongi: ['Bugarama', 'Butare'],
                Nyamasheke: ['Bugarama', 'Butare'],
                Ngororeroi: ['Bugarama', 'Butare'],
                Rutsiro: ['Boneza', 'Gihango', 'Kivumu','Kigeyo']
            },
            sectors: {
                Mukamira: ['Rwankeri','Mukamira'],
                Kintobo: ['Rubande','Gatovu'],
                Bugarama: ['Kamembe', 'Nyakabuye'],
                Butare: ['Bugarama', 'Rukono'],
                Boneza: ['Kamembe', 'Bugarama'],
                Gihango:['Boneza','Gitwe'],
                Rugerero:['Kabarora']
               
                // Add sectors for other districts
            }
        },
          north: {
            districts: {
                Musanze: ['Musanze', 'Muhoza','Kinigi', 'Nyange', 'Gacaca', 'Muko','Busogo','Nkotsi','cyuve','Shyingiro','Gataraga','Kimonyi','Gashyaka','Remera','Rwaza'],
                Gakenke: ['Janja', 'Butare','mataba','Cyabingo','Rugaga','Kivuruga','Busengo','Mugunga','Muzo','Kamusuga','Karambo','Gakenke','Nemba','Mataba','Mianazi','Ruli','Munondo','Munyongwe'],
                Rulindo: ['Shyorongi', 'Rusiga','Ngoma','Murambi','Masoro','Ntarabana','Burega','Cyinzuzi','Mbogo','Tumba','Buyoga','Cyinzozi','Bushoki','Kinihira','Kisaro','Rukozo','Cyungo','Base'],
                Burera: ['Gitovu', 'Ruhengabari','Cyeru','Rwerere','Bungwe','Gatebe','Ruhunde','Nemba','Kivuye','Rusarabuye','Kinyabara','Kinoni','Butaro','Kinyababa','Kagogo','Cyanika','Ruagarama','Gahunga'],
                Gicumbi: ['Kaniga','Rubaya','Cyumba','Mukarange','Rushaki','Muanyagiro','Shangasha','Bwisige','Byumba','Nyarikenke','Mivoye','Rukomo','Kageyo','Ruvune','Nyamiyaga','Rushaki','Rutare','Muko','Rwamiko','Giko','Bukure']
            },
            sectors: {
                Musanze: ['Busogo','Kinigi','musanze'],
                Muhoza: ['muhe','Kalisimbi'],
                Janja: ['Gasharu', 'Nyarusange'],
                Butare: ['Kabaya', 'Kabere'],
                Buyoga: ['kabeza', 'Kabingo'],
                Cyimbogo: ['Kabingo', 'Rwamiko'],
                Gitovu:['gitovu']
            
               
                // Add sectors for other districts
                

              
            }
        },
        




                  south: {
            districts: {
               Huye: ['Gishamvu', 'Huye', 'Karama', 'Kigoma', 'Kinazi', 'Maraba', 'Mbazi', 'Mukura', 'Ngoma', 'Ruhashya', 'Rusatira', 'Rwaniro', 'Simbi', 'Tumba'],
               Muhanga: ['Cyeza', 'Kabacuzi', 'Kibangu', 'Kiyumba', 'Mushishiro', 'Nyabinoni', 'Nyamabuye', 'Nyarusange', 'Rongi', 'Rugendabari', 'Shyogwe'],
               Kamonyi: ['Gacurabwenge', 'Karama', 'Kayenzi', 'Kayumbu', 'Mugina', 'Musambira', 'Ngamba', 'Nyamiyaga', 'Nyarubaka', 'Rugalika', 'Rukoma'],
               Nyanza: ['Busasamana', 'Busoro', 'Cyabakamyi', 'Kibilizi', 'Kigoma', 'Mukingo', 'Muyira', 'Ntyazo', 'Nyagisozi', 'Rwabicuma'],
               Ruhango: ['Bweramana', 'Byimana', 'Kabagali', 'Kinihira', 'Kinazi', 'Mbuye', 'Mwendo', 'Ntongwe', 'Ruhango'],
               Nyamagabe: ['Buruhukiro', 'Cyanika', 'Gasaka', 'Gatare', 'Kaduha', 'Kamegeri', 'Kibirizi', 'Kibumbwe', 'Kitabi', 'Mbazi', 'Mugano', 'Musange', 'Musebeya', 'Mushubi', 'Nkomane', 'Tare', 'Uwinkingi'],
               Nyaruguru: ['Busanze', 'Cyahinda', 'Kibeho', 'Kivu', 'Mata', 'Muganza', 'Munini', 'Ngera', 'Ngoma', 'Nyabimata', 'Nyagisozi', 'Ruheru', 'Rusenge'],
               Gisagara: ['Gikonko', 'Gishubi', 'Kansi', 'Kigembe', 'Muganza', 'Mukindo', 'Musha', 'Ndora', 'Nyanza', 'Save']
            },
            sectors: {
               Gishamvu: ['Gishamvu', 'Gikore', 'Muganza', 'Nyarusange', 'Rwibogo'],
               Huye: ['Huye', 'Kivumu', 'Mukarange', 'Nyundo', 'Rugali'],
               Karama: ['Karama', 'Gihinga', 'Gishege', 'Gisenyi', 'Gitega', 'Kivumu', 'Mugunga', 'Murama', 'Nyarunyinya'],
               Kigoma: ['Kigoma', 'Buhinga', 'Kabuye', 'Kirehe', 'Mugina', 'Nyagihinga', 'Rugali'],
               Kinazi: ['Kinazi', 'Gihinga', 'Gisagara', 'Kabuye', 'Kibanga', 'Mubuga', 'Nyamiyaga', 'Ruhango'],
               Maraba: ['Maraba', 'Gikondo', 'Gishoma', 'Kibaya', 'Mubuga', 'Mukarange', 'Ngarama', 'Ruhango'],
               Mbazi: ['Mbazi', 'Gasharu', 'Gikore', 'Kibanda', 'Kibenga', 'Mubuga', 'Nyarusange', 'Rugali'],
               Mukura: ['Mukura', 'Gakoma', 'Gikoma', 'Kivumu', 'Muvumba', 'Nyarusange', 'Ruhashya'],
               Ngoma: ['Ngoma', 'Gihinga', 'Kibaya', 'Mbare', 'Mihigo', 'Mukura', 'Nyarusange', 'Rugali'],
               Ruhashya: ['Ruhashya', 'Gahama', 'Gikore', 'Mubuga', 'Mukarange', 'Muganza', 'Nyarusange', 'Rugali'],
               Rusatira: ['Rusatira', 'Gishamvu', 'Gishubi', 'Kivumu', 'Mubuga', 'Nyarusange', 'Rugali', 'Rugere'],
               Rwaniro:['Rwaniro', 'Buhinga', 'Gihinga', 'Gitarama', 'Kinyami', 'Mubuga', 'Mukarange', 'Rugali'],
               Simbi:  ['Simbi', 'Bihinga', 'Gikore', 'Kibaya', 'Kigoma', 'Muganza', 'Mukura', 'Nyarusange'],
               Tumba: ['Tumba', 'Gihira', 'Gishamvu', 'Kibaya', 'Kibanda', 'Mubuga', 'Mukarange', 'Nyarusange', 'Rugali'],
               Kibangu: ['kibangu']
                // Add sectors for other districts
            }
        },






        // Add data for other provinces

        east: {
            districts: {
                Nyagatare: ['Gatunda','Karama','Karangazi','Katabagemu','Kiyombe','Matimba','Mimuli','Musheli','Nyagatare','Rukomo','Rwempasha','Rwimiyaga','Tabagwe'],
                Gatsibo: ['Gasange','Gatsibo','Gitoki','Kabarore','Karangazi','Kiramuruzi','Kiziguro','Muhura','Murambi','Ngarama','Nyagihanga','Remera','Rugarama','Rwimbogo'],
                Kayonza: ['Gahini','Kabare','Kabarondo','Mukarange','Murama','Murundi','Mwiri','Ndego','Nyamirama','Rukara','Ruramira','Rwinkwavu'],
                Rwamagana: ['Fumbwe','Gahengeri','Gishari','Karenge','Kigabiro','Muhazi','Munyaga','Musha','Muyumbu','Mwulire','Nyakaliro','Nzige','Rubona'],
                Ngoma: ['Gashanda','Jarama','Karembo','Kibungo','Mugesera','Murama','Mutenderi','Remera','Rukira','Rukumberi','Sake','Zaza'],
                Kirehe: ['Gahara','Gatore','Kigarama','Kigina','Kirehe','Mahama','Mpanga','Mushikiri','Nasho','Nyarubuye','Nyamugari','Nyankurazo'],
                Bugesera: ['Gashora','Juru','Kamabuye','Mareba','Mayange','Mwogo','Ngeruka','Ntarama','Nyamata','Nyarugenge','Rilima','Ruhuha','Rweru','Shyara'],
     
            },
           sectors: {
             Gatunda: ['Gatunda','Kinazi','Kangazi','shisi'],
            Karama: ['karama',],
            Gahini:['gahini'],
            Kabarondo:['Kabarondo', 'nyakariro', 'kigina','nyarubuye','nyamugani','Rwimbogo','ruhinga','nyamugari','rubimba'],
            Nasho:['nasho', 'kabuye','Nyamirama', 'Kigarama', 'nyarubuye','gahara', 'bigarura', 'rukomo','cyaruzinge'],
            Mayange:['mayange']
           },
        }
    };


    // Function to populate options based on selected province
    function populateOptions() {
    const selectedProvince = provinceSelect.value;
    const selectedDistrict = districtSelect.value;
    const selectedSector = sectorSelect.value;

    // Clear previous options
    districtSelect.innerHTML = '';
    sectorSelect.innerHTML = '';
    villageSelect.innerHTML = '';

    // Populate district options
    const districts = provinceData[selectedProvince].districts;
    Object.keys(districts).forEach(district => {
        const option = document.createElement('option');
        option.textContent = district;
        option.value = district;
        districtSelect.appendChild(option);
    });

    // Set selected district based on previous selection or first option
    if (selectedDistrict && districts[selectedDistrict]) {
        districtSelect.value = selectedDistrict;
    } else {
        districtSelect.value = Object.keys(districts)[0];
    }

    // Populate sector options based on the selected district
    const selectedDistrictValue = districtSelect.value;
    const sectors = provinceData[selectedProvince].districts[selectedDistrictValue];
    sectors.forEach(sector => {
        const option = document.createElement('option');
        option.textContent = sector;
        option.value = sector;
        sectorSelect.appendChild(option);
    });

    // Set selected sector based on previous selection or first option
    if (selectedSector && sectors.includes(selectedSector)) {
        sectorSelect.value = selectedSector;
    } else {
        sectorSelect.value = sectors[0];
    }

    // Populate village options based on the selected sector
    const selectedSectorValue = sectorSelect.value;
    const villages = provinceData[selectedProvince].sectors[selectedSectorValue];
    villages.forEach(village => {
        const option = document.createElement('option');
        option.textContent = village;
        option.value = village;
        villageSelect.appendChild(option);
    });
}


    // Call populateOptions() when province selection changes
    provinceSelect.addEventListener('change', populateOptions);
    districtSelect.addEventListener('change', populateOptions);
    sectorSelect.addEventListener('change', populateOptions);

    // Call populateOptions() initially to populate options based on default province selection
    populateOptions();
</script>


<script type="text/javascript">
// Get the modal
var modal = document.getElementById("loginModal");

// Get the button that opens the modal
var btn = document.getElementById("loginBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>




<script>
// Smooth scrolling when clicking on navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));

        target.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
