<?php
// Data untuk 4 anggota CV
$anggota = [
    [
        'id' => 1,
        'nama' => 'Alya Destiani',
        'instagram' => '@alyadestiani1',
        'hobi' => 'Traveling & Hunting',
        'foto' => 'alya2.jpeg'
    ],
    [
        'id' => 2,
        'nama' => 'Nasya A. Rahayu',
        'instagram' => '@whos.nsy',
        'hobi' => 'Menulis & Melukis',
        'foto' => 'nasya.jpeg'
    ],
    [
        'id' => 3,
        'nama' => 'Nazril Gunawan',
        'instagram' => '@zrlgnwn_',
        'hobi' => 'Traveling & Memasak',
        'foto' => 'nazril.jpeg'
    ],
    [
        'id' => 4,
        'nama' => 'Putri Marlina',
        'instagram' => '@putri_mrln22',
        'hobi' => 'Traveling & Putar Musik',
        'foto' => 'putri.jpeg'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hibiscus Group</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e5ecef;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }

        header {
            background: linear-gradient(135deg, #004d6b, #003a52);
            color: white;
            padding: 2rem;
            animation: fadeIn 1s ease-out;
        }

        header h1 {
            font-size: 2.2rem;
            font-weight: 600;
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            width: 90%;
            max-width: 1100px;
            margin: 2rem auto;
        }

        .team-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 1s ease-out;
            cursor: pointer;
        }

        .team-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 77, 107, 0.3);
        }

        .team-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #004d6b;
            margin-bottom: 1rem;
            object-fit: cover;
            object-position: center;
        }

        .team-card h2 {
            color: #004d6b;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .team-card h3 {
            font-size: 1rem;
            color: #005e80;
            margin-bottom: 0.8rem;
        }

        .team-card h3 a {
            color: #005e80;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .team-card h3 a:hover {
            color: #003a52;
        }

        .team-card p {
            font-size: 0.85rem;
            color: #555;
            line-height: 1.4;
        }

        .team-card .profile-link {
            display: inline-block;
            margin-top: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: #004d6b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .team-card .profile-link:hover {
            background-color: #003a52;
        }

        footer {
            background: linear-gradient(135deg, #004d6b, #003a52);
            color: white;
            padding: 1rem;
            margin-top: auto;
        }

        footer p {
            font-size: 0.9rem;
        }

        /* Animasi halus */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsif untuk mobile */
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.8rem;
            }

            .team-container {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }

            .team-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Hibiscus Group</h1>
    </header>

    <div class="team-container">
        <?php foreach ($anggota as $member): ?>
            <div class="team-card" onclick="redirectToMember('<?php echo strtolower(explode(' ', $member['nama'])[0]); ?>')">
                <img src="<?php echo $member['foto']; ?>" alt="Foto <?php echo $member['nama']; ?>">
                <h2><?php echo $member['nama']; ?></h2>
                <h3><a href="https://instagram.com/<?php echo substr($member['instagram'], 1); ?>" target="_blank" onclick="event.stopPropagation()"><?php echo $member['instagram']; ?></a></h3>
                <p>Hobi: <?php echo $member['hobi']; ?></p>
                <a href="javascript:void(0)" class="profile-link" onclick="redirectToMember('<?php echo strtolower(explode(' ', $member['nama'])[0]); ?>')">Lihat Profil</a>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2025 - Dibuat oleh Hibiscus Group</p>
    </footer>

    <script>
        // Fungsi untuk mengarahkan ke folder anggota
        function redirectToMember(memberName) {
            // Mapping nama anggota ke folder
            const memberFolders = {
                'alya': '/alya',
                'nasya': '/nasya', 
                'nazril': '/nazril',
                'putri': '/putri'
            };
            
            // Dapatkan path folder berdasarkan nama anggota
            const folderPath = memberFolders[memberName];
            
            if (folderPath) {
                // Redirect ke folder anggota
                window.location.href = folderPath;
            } else {
                alert('Folder anggota tidak ditemukan!');
            }
        }
    </script>
</body>
</html>