// Data card berita yang akan ditampilkan//
var cards = [{
    imageUrl: 'images/logo_damkar_resize.png',
    title: 'Penginapan',
    description: 'Penginapan yang disediakan pada hotel aston terbagi sesuai tipe kamar dan terdapat tipe tempat tidur yang bisa dipilih oleh pemesan.',
    llink: '/berita_isi_public'
},
{
    imageUrl: 'images/logo_kab_banyuwangi.png',
    title: 'Sewa Ruangan',
    description: 'Ruangan dapat disewa pada hotel aston seperti Balriim untuk kegiatan, terdadpat area kolah ataupun beberapa tempat lainnya yang ocok digunakan untuk kegiatan acara.',
   llink: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran1',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    llink: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran2',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran3',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran4',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran5',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran6',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran7',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran8',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar_resize.png',
    title: 'Penginapan',
    description: 'Penginapan yang disediakan pada hotel aston terbagi sesuai tipe kamar dan terdapat tipe tempat tidur yang bisa dipilih oleh pemesan.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_kab_banyuwangi.png',
    title: 'Sewa Ruangan',
    description: 'Ruangan dapat disewa pada hotel aston seperti Balriim untuk kegiatan, terdadpat area kolah ataupun beberapa tempat lainnya yang ocok digunakan untuk kegiatan acara.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran1',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
 link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran2',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran3',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
  link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran4',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran5',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran6',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran7',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
   link: '{{ route("berita.isi") }}'
},
{
    imageUrl: 'images/logo_damkar.png',
    title: 'Restoran8',
    description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
    link: '{{ route("berita.isi") }}'
}

];

// // Fungsi untuk menampilkan card pada halaman tertentu
// function displayCards_berita(page) {
// var cardsPerPage = 9; // Jumlah kartu per halaman
// var startIndex = (page - 1) * cardsPerPage;
// var endIndex = Math.min(startIndex + cardsPerPage, cards.length);

// var cardContainer = document.getElementById('card-container-berita');
// cardContainer.innerHTML = '';

// for (var i = startIndex; i < endIndex; i++) {
//     var cardData = cards[i];
//     var cardHtml = `
//     <div class="col mb-2">
//         <div class="card h-100 text-center">
//             <div class="card-header bg-danger"></div>
//             <a href="${cardData.link}"><img src="${cardData.imageUrl}" class="card-img-top" alt="${cardData.title}" /></a>
//             <div class="card-body">
//                 <a href="${cardData.link}"><h5 class="card-title">${cardData.title}</h5></a>
//                 <p class="card-text">${cardData.description}</p>
//             </div>
//             <div class="card-footer">
//                 <button class="btn btn-primary" onclick="window.location.href = '${cardData.link}';">Detail</button>
//             </div>
//         </div>
//     </div>
// `;
//     cardContainer.innerHTML += cardHtml;
// }

// // Jika jumlah kartu lebih dari 9, tampilkan pagination
// if (cards.length > 9) {
//     displayPagination_berita();
// } else {
//     // Jika tidak, kosongkan pagination
//     document.getElementById('pagination').innerHTML = '';
// }
// }

// // Fungsi untuk menampilkan pagination pada card tampilan berita
// function displayPagination_berita() {
// var pagination = document.getElementById('pagination').querySelector('ul');
// pagination.innerHTML = '';

// var cardsPerPage = 9; // Jumlah kartu per halaman
// var numPages = Math.ceil(cards.length / cardsPerPage);
// for (var i = 1; i <= numPages; i++) {
//     var listItem = document.createElement('li');
//     listItem.classList.add('page-item');

//     var link = document.createElement('a');
//     link.classList.add('page-link');
//     link.href = '#';
//     link.textContent = i;
//     link.onclick = function() {
//         displayCards_berita(parseInt(this.textContent)); //Perilaku default
//         // displayCards_berita(parseInt(this.textContent));
//         // return false; // Mencegah perilaku default
//     };

//     listItem.appendChild(link);
//     pagination.appendChild(listItem);
// }
// }

// // Menampilkan halaman pertama saat halaman dimuat
// displayCards_berita(1);
// // Data card berita akhir//


     // Fungsi untuk menampilkan card pada halaman tertentu
     function displayCards_berita(page) {
        var cardsPerPage = 9; // Jumlah kartu per halaman
        var startIndex = (page - 1) * cardsPerPage;
        var endIndex = Math.min(startIndex + cardsPerPage, cards.length);

        var cardContainer = document.getElementById('card-container-berita');
        cardContainer.innerHTML = '';

        for (var i = startIndex; i < endIndex; i++) {
            var cardData = cards[i];
            var cardHtml = `
                <div class="col mb-2">
                    <div class="card h-100 text-center">
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

        // Jika jumlah kartu lebih dari 9, tampilkan pagination
        if (cards.length > 9) {
            displayPagination_berita();
        } else {
            // Jika tidak, kosongkan pagination
            document.getElementById('pagination').innerHTML = '';
        }
    }

    // Fungsi untuk menampilkan pagination pada card tampilan berita
    function displayPagination_berita() {
        var pagination = document.getElementById('pagination').querySelector('ul');
        pagination.innerHTML = '';

        var cardsPerPage = 9; // Jumlah kartu per halaman
        var numPages = Math.ceil(cards.length / cardsPerPage);
        for (var i = 1; i <= numPages; i++) {
            var listItem = document.createElement('li');
            listItem.classList.add('page-item');

            var link = document.createElement('a');
            link.classList.add('page-link');
            link.href = '#';
            link.textContent = i;
            link.onclick = function() {
                displayCards_berita(parseInt(this.textContent));
            };

            listItem.appendChild(link);
            pagination.appendChild(listItem);
        }
    }

    // Menampilkan halaman pertama saat halaman dimuat
    displayCards_berita(1);

