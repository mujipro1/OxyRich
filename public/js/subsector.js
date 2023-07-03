// Array of sectors and their subsectors
const sectors = [
    {
      sector: 'D',
      subsectors: ['D-11', 'D-12', 'D-13', 'D-14', 'D-15', 'D-16', 'D-17']
    },
    {
      sector: 'E',
      subsectors: ['E-1', 'E-2', 'E-3', 'E-4', 'E-5']
    },
    {
      sector: 'F',
      subsectors: ['F-1', 'F-2', 'F-3', 'F-4']
    },
    {
      sector: 'G',
      subsectors: ['G-1', 'G-2', 'G-3']
    },
    {
      sector: 'H',
      subsectors: ['H-1', 'H-2', 'H-3', 'H-4']
    },
    {
      sector: 'I',
      subsectors: ['I-1', 'I-2']
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