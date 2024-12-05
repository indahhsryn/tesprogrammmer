<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengguna</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
  <h1>Daftar Pengguna</h1>

  <div id="loading" style="display: none;">Loading...</div>

  <div id="error" style="display: none; color: red;">
    <p>Terjadi kesalahan saat mengambil data pengguna.</p>
  </div>

  <ul id="user-list"></ul>

  <script>
    const userList = document.getElementById('user-list');
    const loadingMessage = document.getElementById('loading');
    const errorMessage = document.getElementById('error');

    async function fetchUsers() {
      loadingMessage.style.display = 'block';
      errorMessage.style.display = 'none';

      try {
        const response = await axios.get('https://jsonplaceholder.typicode.com/users');
        const users = response.data;
        userList.innerHTML = '';

        users.forEach(user => {
          const li = document.createElement('li');
          li.innerHTML = `
            <strong>${user.name}</strong> (${user.username})<br>
            Email: ${user.email}<br>
            Phone: ${user.phone}<br>
            Website: <a href="http://${user.website}" target="_blank">${user.website}</a><br><br>
            <strong>Alamat:</strong><br>
            ${user.address.street}, ${user.address.suite}, ${user.address.city}, ${user.address.zipcode}<br>
            <strong>Geo:</strong> Lat: ${user.address.geo.lat}, Lng: ${user.address.geo.lng}<br>
            <hr>
          `;
          userList.appendChild(li);
        });
      } catch (error) {
        errorMessage.style.display = 'block';
        console.error('Error fetching users:', error);
      } finally {
        loadingMessage.style.display = 'none';
      }
    }

    window.onload = fetchUsers;
  </script>
</body>
</html>
