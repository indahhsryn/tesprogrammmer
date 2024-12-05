<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Article List with Pagination</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7f6;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
      margin: 0;
    }
    .container {
      width: 80%;
      max-width: 900px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .post-list {
      list-style-type: none;
      padding: 0;
      padding-top: 30px !important;
    }
    .post-item {
      background-color: #f9f9f9;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .pagination button,
    .pagination .page-number {
      padding: 10px 20px;
      border: 1px solid #007bff;
      background-color: #fff;
      color: #007bff;
      border-radius: 4px;
      margin: 0 5px;
      cursor: pointer;
    }
    .pagination button:hover,
    .pagination .page-number:hover {
      background-color: #007bff;
      color: white;
    }
    .pagination .active {
      background-color: #007bff;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Article List</h1>
    <ul id="post-list" class="post-list"></ul>

    <div class="pagination" id="pagination">
      <button id="prev" onclick="changePage(currentPage - 1)">Previous</button>
      <!-- Page numbers will be inserted dynamically -->
      <div id="page-numbers"></div>
      <button id="next" onclick="changePage(currentPage + 1)">Next</button>
    </div>
  </div>

  <script>
    const postsPerPage = 5;
    const totalPages = 4;  // Total pages you want to show
    let currentPage = 1;

    async function fetchPosts(page) {
      if (page < 1 || page > totalPages) return;  // Prevent invalid pages

      try {
        const response = await axios.get('https://jsonplaceholder.typicode.com/posts', {
          params: {
            _page: page,
            _limit: postsPerPage,
          }
        });

        const posts = response.data;

        // Render posts
        const postList = document.getElementById('post-list');
        postList.innerHTML = '';
        posts.forEach(post => {
          const listItem = document.createElement('li');
          listItem.classList.add('post-item');
          listItem.innerHTML = `
            <h3>${post.title}</h3>
            <p>${post.body}</p>
          `;
          postList.appendChild(listItem);
        });

        // Update pagination
        updatePagination(page);
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }

    function updatePagination(page) {
      currentPage = page;

      // Disable Previous/Next button if out of bounds
      document.getElementById('prev').disabled = currentPage === 1;
      document.getElementById('next').disabled = currentPage === totalPages;

      // Generate page numbers dynamically
      const pageNumbers = document.getElementById('page-numbers');
      pageNumbers.innerHTML = ''; // Clear existing page numbers

      for (let i = 1; i <= totalPages; i++) {
        const pageButton = document.createElement('button');
        pageButton.textContent = i;
        pageButton.classList.add('page-number');
        if (i === currentPage) {
          pageButton.classList.add('active');
        }
        pageButton.onclick = () => changePage(i);
        pageNumbers.appendChild(pageButton);
      }
    }

    function changePage(page) {
      fetchPosts(page);
    }

    // Initial fetch of posts
    fetchPosts(currentPage);
  </script>
</body>
</html>
