<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Mahika Trans</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --blue: #065084; --dark: #043a60; }
        body { font-family: 'Poppins', sans-serif; background: radial-gradient(circle at top right, var(--dark), var(--blue)); margin: 0; display: flex; justify-content: center; align-items: center; height: 100vh; color: white; }
        .login-box { width: 90%; max-width: 350px; background: white; padding: 40px 30px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.3); color: #333; text-align: center; }
        h2 { color: var(--blue); font-weight: 700; margin-bottom: 30px; }
        input { width: 100%; padding: 15px; margin-bottom: 15px; border: 1.5px solid #eee; border-radius: 12px; box-sizing: border-box; font-family: 'Poppins'; }
        button { width: 100%; padding: 15px; background: var(--blue); border: none; color: white; border-radius: 12px; font-weight: 700; cursor: pointer; transition: 0.3s; }
        #msg { color: red; font-size: 12px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Mahika Trans</h2>
        <form id="loginForm">
            <input type="text" id="user" placeholder="Username" required>
            <input type="password" id="pass" placeholder="Password" required>
            <button type="submit" id="btnLogin">Masuk</button>
        </form>
        <div id="msg"></div>
    </div>
    <script>
        const API = "https://script.google.com/macros/s/AKfycbymE-FI9lSBvS0vkGqc8ekjDbjau21u-j-vCwNJtQc7VB7SfABQw4Mwz4M2GYfoQ4CLPQ/exec";
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('btnLogin');
            btn.innerText = "Memverifikasi...";
            btn.disabled = true;
            try {
                const res = await fetch(`${API}?action=login&user=${document.getElementById('user').value}&pass=${document.getElementById('pass').value}`);
                const data = await res.json();
                if (data.status === "success") {
                    localStorage.setItem("mahika_session", "active");
                    window.location.href = "input.html";
                } else {
                    document.getElementById('msg').innerText = data.message;
                    btn.innerText = "Masuk";
                    btn.disabled = false;
                }
            } catch (err) { alert("Server error!"); btn.disabled = false; }
        });
    </script>
</body>
</html>
