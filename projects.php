<?php
// Project Data Array
$projects = [
    [
        'title' => 'Travel Life Support App',
        'tag' => 'Analysis & Health',
        'desc' => 'Designed a mobile app matching user travel experiences. Implemented personalized tracking features and used Figma for wireframing.',
        'link' => '#',
        'image' => 'assets/img/laptop.png' 
    ],
    [
        'title' => 'The Honey Badger',
        'tag' => 'Development MVP',
        'desc' => 'Don\'t replace Salesforce or SAP yet. That is a billion-dollar battle. Instead, fix the broken parts of them. We will build "Micro-Agents" that solve specific, expensive pain points. Companies will pay for these results immediately.',
        'link' => 'honey-badger.php',
        'image' => 'assets/img/notepad.png'
    ],
    [
        'title' => 'Bachelors Kanakku',
        'tag' => 'Financial Management',
        'desc' => 'The Pre-paid Pooled Fund Model (PFM). We are rebranding this solution as "Bachelors Kanakku". In this model, liquidity is centralized (held by a "Treasurer" or "Room Rep"), while equity is distributed. This creates a distinct architectural challenge: decoupling "Physical Cash" from "Virtual Ownership."',
        'link' => 'bachelors-kanakku.php',
        'image' => 'assets/img/tablet.png'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Projects | Niranjan Balaji J</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS (reusing variables from style.css) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/project.css">
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
            if(e.keyCode == 123) { return false; }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) { return false; }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) { return false; }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) { return false; }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) { return false; }
        }
    </script>
</head>
<body>

<div class="container">
    <div class="back-btn-container">
        <a href="index.html" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
    </div>

    <div class="section-title">
        <h1><u>My Projects</u></h1>
        <p>A curated list of my technical and design work.</p>
    </div>

    <div class="row g-4">
        <?php foreach ($projects as $project): ?>
        <div class="col-md-6 col-lg-4">
            <div class="project-card-custom">
                <div class="project-tag"><?php echo $project['tag']; ?></div>
                <h3><?php echo $project['title']; ?></h3>
                <p><?php echo $project['desc']; ?></p>
                <?php 
                    $href = "case-study.php?title=" . urlencode($project['title']) . "&tag=" . urlencode($project['tag']) . "&link=" . urlencode($project['link']);
                    // Direct link for Bachelor's Kanakku or other custom detail pages, but preserve Honey Badger's case study flow
                    if ($project['link'] && $project['link'] !== '#' && strpos($project['link'], '.php') !== false && $project['title'] !== 'The Honey Badger') {
                        $href = $project['link'];
                    }
                ?>
                <a href="<?php echo $href; ?>" class="btn-view">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
