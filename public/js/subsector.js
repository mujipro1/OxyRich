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
 
// Get the sector buttons and subsectors container
const sectorButtons = document.querySelectorAll('.myBtn2 btn btn-dark');
const subsectorsContainer = document.querySelector('.contlayout p-4');

// Event listener for sector buttons
sectorButtons.forEach((button) => {
    button.addEventListener('click', () => {
      const sector = button.getAttribute('data-sector');
      const selectedSector = sectors.find((s) => s.sector === sector);
  
      // Clear the subsectors container
      subsectorsContainer.innerHTML = '';
  
      // Create and append subsector divs
      selectedSector.subsectors.forEach((subsector) => {
        const subsectorDiv = document.createElement('div');
        subsectorDiv.textContent = subsector;
        subsectorsContainer.appendChild(subsectorDiv);
      });
    });
  });