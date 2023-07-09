// Array of sectors and their subsectors
const sectors = [
    {
      sector: 'D',
      subsectors: ['D-11', 'D-12', 'D-13', 'D-14', 'D-15', 'D-16', 'D-17']
    },
    {
      sector: 'E',
      subsectors: ['E-7', 'E-8', 'E-9', 'E-10', 'E-11','E-12', 'E-13', 'E-14', 'E-15', 'E-16','E-17','E-18']
    },
    {
      sector: 'F',
      subsectors: ['F-5', 'F-6', 'F-7', 'F-8','F-9', 'F-10', 'F-11', 'F-12','F-13', 'F-14', 'F-15', 'F-16','F-17']
    },
    {
      sector: 'G',
      subsectors: ['G-5', 'G-6', 'G-7', 'G-8','G-9', 'G-10', 'G-11', 'G-12','G-13', 'G-14', 'G-15', 'G-16','G-17']
    },
    {
      sector: 'H',
      subsectors: ['H-8','H-9', 'H-10', 'H-11', 'H-12','H-13', 'H-14', 'H-15', 'H-16','H-17']
    },
    {
      sector: 'I',
      subsectors: ['I-8','I-9', 'I-10', 'I-11', 'I-12','I-13', 'I-14', 'I-15', 'I-16','I-17','I-18']
    }
  ];
 

sectorOptions = document.querySelector('#sector');
subsectorOptions = document.querySelector('#subsector');

// Populate the sector options
sectors.forEach(function(sector) {
  option = document.createElement('option');
  option.text = sector.sector;
  option.value = sector.sector;
  sectorOptions.add(option);
});


// Populate the subsector options
sectorOptions.addEventListener('change', function() {
  subsectorOptions.innerHTML = '';
  sectors.forEach(function(sector) {
    if (sector.sector === sectorOptions.value) {
      subsectorOptions.disabled = false;
      sector.subsectors.forEach(function(subsector) {
        option = document.createElement('option');
        option.text = subsector;
        option.value = subsector;
        subsectorOptions.add(option);
      });
    }
  });
  document.getElementById('subLabel').classList.remove('muted');
});

if(sectorOptions.classList.contains("specialSector")){
  document.getElementById('editBtn').addEventListener('click', function(){
    sector = document.querySelector('.specialSector').value;  
    subsector = document.querySelector('.specialSubsector').value;
    
  });
}