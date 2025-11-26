<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alya Destiani - Hibiscus Group</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #e5ecef;
    color: #333;
    margin: 0;
    text-align: center;
}
header {
    background: linear-gradient(135deg, #006994, #004d6b);
    color: white;
    padding: 2rem;
}
.profile {
    background: white;
    max-width: 650px;
    margin: 2rem auto;
    padding: 2rem;
    border-radius: 18px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
    animation: fadeIn 1s ease;
}
.profile img {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    border: 5px solid #006994;
    object-fit: cover;
    margin-bottom: 1rem;
}
.profile h2 { color: #006994; margin-bottom: .4rem; }
.profile h3 a { color: #007fa5; text-decoration: none; }
.profile p {
    text-align: justify;
    line-height: 1.6;
    margin-top: 1rem;
}
.gallery {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 1.5rem;
}
.gallery img {
    width: 100px;
    height: 100px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid #006994;
}
a.back {
    display: inline-block;
    margin-top: 1.5rem;
    background-color: #006994;
    color: white;
    padding: 0.6rem 1.2rem;
    border-radius: 6px;
    text-decoration: none;
}
a.back:hover {
    background-color: #004d6b;
}
footer {
    background: linear-gradient(135deg, #006994, #004d6b);
    color: white;
    padding: 1rem;
}
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(15px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>
</head>
<body>
<header>
    <h1>Profil Alya Destiani</h1>
</header>

<div class="profile">
    <img src="../alya2.jpeg" alt="Alya Destiani">
    <h2>Alya Destiani</h2>
    <h3><a href="https://instagram.com/alyadestiani1" target="_blank">@alyadestiani1</a></h3>
    <p>
        Alya adalah sosok petualang sejati. Ia gemar <strong>traveling</strong> dan <strong>hunting</strong> 
        tempat baru yang unik. Ia percaya bahwa setiap perjalanan membawa kisah dan pelajaran yang tak ternilai. 
        Dalam setiap langkahnya, Alya selalu membawa semangat kebebasan dan rasa ingin tahu yang tinggi.
    </p>
    <div class="gallery">
        <img src="../alya2.jpeg" alt="">
        <img src="../alya2.jpeg" alt="">
        <img src="../alya2.jpeg" alt="">
    </div>
    <a href="../index.php" class="back">? Kembali</a>
</div>

<footer><p>&copy; 2025 Hibiscus Group</p></footer>
</body>
</html>
