// Tunggu untuk DOM di load
document.addEventListener('DOMContentLoaded', function() {
    // Mengubah tampilan head
    const heading = document.querySelector('h3');
    if (heading) {
        // ubah kontent
        heading.textContent = 'TAMBAH DATA MATAKULIAH SEMESTER GANJIL 2024/2025';
        
        // Add styles
        heading.style.color = 'green';
        heading.style.backgroundColor = 'yellow';
    }

    // Ubah tampilan dropdown
    const codeSelect = document.getElementById('idmatkul1');
    if (codeSelect) {
        codeSelect.style.backgroundColor = 'cyan';
        
        // Add hover
        codeSelect.addEventListener('mouseover', function() {
            this.style.backgroundColor = 'lightcyan';
        });
        codeSelect.addEventListener('mouseout', function() {
            this.style.backgroundColor = 'cyan';
        });
    }

    // Ubah tampilan text input
    const codeInput = document.getElementById('idmatkul2');
    if (codeInput) {
        codeInput.style.backgroundColor = 'magenta';
        
        // Add hover
        codeInput.addEventListener('mouseover', function() {
            this.style.backgroundColor = 'lightpink';
        });
        codeInput.addEventListener('mouseout', function() {
            this.style.backgroundColor = 'magenta';
        });
        codeInput.style.color = 'white';
    }
});