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

// Get the container to hold the subsector buttons
var container = document.querySelector('.contlayout');
const sectorButtons = document.querySelectorAll('.myBtn2 btn btn-dark');

// Event listener for sector buttons
sectorButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const sector = button.getAttribute('data-sector');
    window.location.href = '/subsector?sector=' + sector;
  });
});

// Get the selected sector from the query parameter
var urlParams = new URLSearchParams(window.location.search);
var selectedSector = urlParams.get('sector');

// Find the selected sector object from the sectors array
var sectorObj = sectors.find((sector) => sector.sector === selectedSector);

// Generate subsector buttons
sectorObj.subsectors.forEach((subsector) => {
  var button = document.createElement('button');
  button.className = 'myBtn2 btn btn-dark';
  button.type = 'button';
  button.textContent = subsector;

  container.appendChild(button);
});
