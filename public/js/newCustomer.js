document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('#noofbottles').addEventListener('change', updateSecurity);
    document.querySelector('#security').addEventListener('change', updateSecurity);

    function updateSecurity() {
        var noofbottles = document.getElementById('noofbottles').value;
        var security = document.getElementById('security').value;
        var totalSec = noofbottles * security;
        document.querySelector('.totalSec').innerHTML = "Total Security : Pkr " + totalSec + "/-";
        document.querySelector('.totalSec').classList.add('text-success');
    }
});

cnicInput = document.getElementById('cnic-input');
cnicInput.addEventListener('input', function() {
    cnic = this.value.replace(/-/g, '');
    length = cnic.length;

    if (length <= 13) {
        if (length >= 5 && length < 13) {
            cnic = cnic.slice(0, 5) + '-' + cnic.slice(5);
        } else if (length === 13) {
            cnic = cnic.slice(0, 5) + '-' + cnic.slice(5, 12) + '-' + cnic.slice(12);
        }
    } else {
        cnic = cnic.slice(0, 13);
    }
    this.value = cnic;
});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('#dispenser').addEventListener('change', function() {
        if (this.value === 'Yes') {
            document.getElementById('securityD').disabled = false;
            document.getElementById('noofDispensers').disabled = false;
        } else {
            document.getElementById('securityD').disabled = true;
            document.getElementById('noofDispensers').disabled = true;
            document.getElementById('securityD').value = '';
            document.getElementById('noofDispensers').value = '';
            document.querySelector('.totalDSec').innerHTML = 'Total Security :';
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('#noofDispensers').addEventListener('change', updateSecurityD);
    document.querySelector('#securityD').addEventListener('change', updateSecurityD);

    function updateSecurityD() {
        var noofDispensers = document.getElementById('noofDispensers').value;
        var securityD = document.getElementById('securityD').value;
        var totalDSec = noofDispensers * securityD;
        document.querySelector('.totalDSec').innerHTML = "Total Security : Pkr " + totalDSec + "/-";
        document.querySelector('.totalDSec').classList.add('text-success');
    }
});