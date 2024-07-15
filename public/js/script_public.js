//js berita//
// Data card berita yang akan ditampilkan
var cards = [{
        imageUrl: 'images/logo_damkar_resize.png',
        title: 'Penginapan',
        description: 'Penginapan yang disediakan pada hotel aston terbagi sesuai tipe kamar dan terdapat tipe tempat tidur yang bisa dipilih oleh pemesan.',
        link: 'penginapan.php'
    },
    {
        imageUrl: 'images/logo_kab_banyuwangi.png',
        title: 'Sewa Ruangan',
        description: 'Ruangan dapat disewa pada hotel aston seperti Balriim untuk kegiatan, terdadpat area kolah ataupun beberapa tempat lainnya yang ocok digunakan untuk kegiatan acara.',
        link: 'sewaruangan.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    }

];

// Fungsi untuk menampilkan card pada halaman tertentu
function displayCards(page) {
    var startIndex = (page - 1) * 3;
    var endIndex = Math.min(startIndex + 3, cards.length);

    var cardContainer = document.getElementById('card-container');
    cardContainer.innerHTML = '';

    for (var i = startIndex; i < endIndex; i++) {
        var cardData = cards[i];
        var cardHtml = `
    <div class="col mb-2">
        <div class="card h-100 text-center ">
            <div class="card-header bg-danger"></div>
           <a href="${cardData.link}"><img src="${cardData.imageUrl}" class="card-img-top" alt="${cardData.title}" /></a>
            <div class="card-body">
               <a href="${cardData.link}"><h5 class="card-title">${cardData.title}</h5></a>
                <p class="card-text">${cardData.description}</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" onclick="window.location.href = '${cardData.link}';">Detail</button>
            </div>
        </div>
    </div>
`;
        cardContainer.innerHTML += cardHtml;
    }
}

// Fungsi untuk menampilkan pagination//
function displayPagination() {
    var pagination = document.getElementById('pagination').querySelector('ul');
    pagination.innerHTML = '';

    var numPages = Math.ceil(cards.length / 3);
    for (var i = 1; i <= numPages; i++) {
        var listItem = document.createElement('li');
        listItem.classList.add('page-item');

        var link = document.createElement('a');
        link.classList.add('page-link');
        link.href = '#';
        link.textContent = i;
        link.onclick = function() {
            displayCards(parseInt(this.textContent));
            return false; // Mencegah perilaku default
        };

        listItem.appendChild(link);
        pagination.appendChild(listItem);
    }
}

// Menampilkan halaman pertama saat halaman dimuat
displayCards(1);
displayPagination();
//js berita akhir//
