document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('#noofbottles').addEventListener('keyup', updateSecurity);
    document.querySelector('#security').addEventListener('keyup', updateSecurity);

    function updateSecurity() {
        var noofbottles = document.getElementById('noofbottles').value;
        var security = document.getElementById('security').value;
        var totalSec = noofbottles * security;
        document.querySelector('.totalSec').innerHTML = "Total Security : Pkr " + totalSec + "/-";
        document.querySelector('.totalSec').classList.add('text-success');
    }
    
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

    document.querySelector('#dispenser').addEventListener('change', function() {
        if (this.value === 'Yes') {
            document.getElementById('securityD').disabled = false;
            document.getElementById('noofDispensers').disabled = false;
            document.querySelector('.dnodisp').classList.remove('muted');
            document.querySelector('.dsec').classList.remove('muted');
        } else {
            document.getElementById('securityD').disabled = true;
            document.getElementById('noofDispensers').disabled = true;
            document.getElementById('securityD').value = '';
            document.getElementById('noofDispensers').value = '';
            document.querySelector('.dnodisp').classList.add('muted');
            document.querySelector('.dsec').classList.add('muted');
            document.querySelector('.totalDSec').innerHTML = 'Total Security :';
        }
    });

    document.querySelector('#noofDispensers').addEventListener('keyup', updateSecurityD);
    document.querySelector('#securityD').addEventListener('keyup', updateSecurityD);

    function updateSecurityD() {
        var noofDispensers = document.getElementById('noofDispensers').value;
        var securityD = document.getElementById('securityD').value;
        var totalDSec = noofDispensers * securityD;
        document.querySelector('.totalDSec').innerHTML = "Total Security : Pkr " + totalDSec + "/-";
        document.querySelector('.totalDSec').classList.add('text-success');
    }

    pass = document.querySelector('#password')
    confirmPass = document.querySelector('#confirmPassword')

    confirmPass.addEventListener('keyup', function() {
        if (pass.value !== confirmPass.value) {
            document.querySelector('.error').innerHTML = '❌<i> Passwords do not match</i>';
            document.querySelector('.error').classList.add('text-danger');
            document.querySelector('.error').classList.remove('text-success');
        } else {
            document.querySelector('.error').innerHTML = '✅ <i>Passwords match</i>';
            document.querySelector('.error').classList.add('text-success');
            document.querySelector('.error').classList.remove('text-danger');
        }
    });
    
    pass.addEventListener('keyup', function() {
        if (pass.value.length < 8) {
            document.querySelector('.error2').innerHTML = '❌ <i>Password must be atleast 8 characters long</i>';
            document.querySelector('.error2').classList.add('text-danger');
            document.querySelector('.error2').classList.remove('text-success');
        } else {
            document.querySelector('.error2').innerHTML = '✅ <i>Password is valid</i>';
            document.querySelector('.error2').classList.add('text-success');
            document.querySelector('.error2').classList.remove('text-danger');
        }
    });
        
});