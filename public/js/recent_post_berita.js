
// Data recent posts pada berita bagian post scroll pada tampilan isi berita//
const recentPosts = [{
    title: "Pengembangan Kompetensi Pegawai",
    date: "February 19, 2019",
    img: "https://via.placeholder.com/60x60",
    link: "#"
},
{
    title: "Dinas Pemadam Kebakaran dan Penyelamatan (DPKP)",
    date: "May 02, 2023",
    img: "https://via.placeholder.com/60x60",
    link: "#"
},
{
    title: "Wisata Pemadam Kebakaran untuk anak-anak (Wisdamcil) Dibuka",
    date: "February 25, 2019",
    img: "https://via.placeholder.com/60x60",
    link: "#"
},
{
    title: "Post 4",
    date: "March 10, 2022",
    img: "https://via.placeholder.com/60x60",
    link: "#"
},
{
    title: "Post 5",
    date: "January 5, 2021",
    img: "https://via.placeholder.com/60x60",
    link: "#"
},
{
    title: "Post 6",
    date: "April 20, 2020",
    img: "https://via.placeholder.com/60x60",
    link: "#"
}
];

// Function untuk sortir tampilan post by tanggal
function sortPostsByDate(posts) {
return posts.sort((a, b) => new Date(b.date) - new Date(a.date));
}

// Function untuk mengatur display posts
function displayRecentPosts(posts) {
const sortedPosts = sortPostsByDate(posts);
const recentPostsContainer = document.getElementById('recent-posts');
recentPostsContainer.innerHTML = '';

sortedPosts.slice(0).forEach(post => {
    const postElement = document.createElement('a');
    postElement.href = post.link;
    postElement.className = 'list-group-item list-group-item-action';

    postElement.innerHTML = `
    <img src="${post.img}" alt="Gambar Berita Kecil" class="recent-post-img">
    <div>
        <h6 class="mb-1">${post.title}</h6>
        <small class="text-muted">${post.date}</small>
    </div>
`;

    recentPostsContainer.appendChild(postElement);
});
}

// tampilan recent post  loading
document.addEventListener('DOMContentLoaded', function() {
displayRecentPosts(recentPosts);
});
// Data recent posts pada berita bagian post scroll pada tampilan isi berita akhir//
