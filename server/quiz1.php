<?php
session_start();

$q = isset($_GET['q']) ? (int)$_GET['q'] : 1;

// Define questions
$questions = [
    1 => [
        'question' => 'What is the primary cause of current climate change ?',
        'options' => [
            'A' => 'Solar flares',
            'B' => 'Human activities like burning fossil fuels',
            'C' => 'Natural Earth cycles',
            'D' => 'Changes in Earth\'s orbit'
        ],
        'answer' => 'B',
        'explanation' => 'Human activities are the dominant force behind the rapid climate change we are witnessing today. The burning of fossil fuels such as coal, oil, and natural gas releases large amounts of carbon dioxide (CO₂) and other greenhouse gases into the atmosphere. These gases trap heat, leading to the warming of the planet. While natural factors like volcanic eruptions and solar variations have influenced climate in the past, the current trend is too rapid and aligns closely with industrial activities since the 18th century. Deforestation further exacerbates the problem by reducing the planet\'s ability to absorb CO₂.'    ],
    2 => [
        'question' => 'Which gas is the most significant contributor to global warming?',
        'options' => [
            'A' => 'Methane',
            'B' => 'Oxygen',
            'C' => 'Carbon Dioxide',
            'D' => 'Nitrogen'
        ],
        'answer' => 'C',
        'explanation' => 'Carbon Dioxide (CO₂) is the most significant greenhouse gas contributing to global warming, primarily because of its abundance and the longevity it maintains in the atmosphere. CO₂ is produced through human activities like burning fossil fuels for energy and transportation, industrial processes, and deforestation. Although other gases like methane and nitrous oxide are more potent per molecule, carbon dioxide\'s massive volume makes it the most important driver of long-term climate change. Once released, CO₂ can remain in the atmosphere for hundreds to thousands of years, continuing to trap heat.'
    ],
    3 => [
        'question' => 'Which phenomenon describes the trapping of heat in the Earth’s atmosphere?',
        'options' => [
            'A' => 'Greenhouse Effect',
            'B' => 'Ozone Depletion',
            'C' => 'Photosynthesis',
            'D' => 'Solar Radiation'
        ],
        'answer' => 'A',
        'explanation' => 'The Greenhouse Effect refers to the natural process where certain gases in Earth\'s atmosphere, like carbon dioxide, methane, and water vapor, trap heat from the Sun. Without this effect, the Earth\'s average temperature would be about -18°C (0°F), making it inhospitable for most current life forms. However, human activities have intensified this effect by increasing the concentration of greenhouse gases, leading to more heat being trapped and thus causing global temperatures to rise. It\'s important to distinguish this from ozone depletion, which affects UV radiation rather than heat retention.'    ],
    4 => [
        'question' => 'Rising sea levels are primarily caused by:',
        'options' => [
            'A' => 'Increased volcanic activity',
            'B' => 'Melting glaciers and thermal expansion',
            'C' => 'Decrease in Earth’s gravity',
            'D' => 'Less rainfall'
        ],
        'answer' => 'B',
        'explanation' => 'Rising sea levels are a direct consequence of two key processes driven by global warming. First, as atmospheric temperatures rise, glaciers and ice sheets melt at an accelerated pace, releasing vast amounts of freshwater into the oceans. Second, as water warms, it expands — a physical property known as thermal expansion. Together, these processes are causing sea levels to rise globally, threatening coastal communities, ecosystems, and economies. Scientists project that, without significant emission reductions, sea levels could rise by over a meter by the end of this century.'
    ],
    5 => [
        'question' => 'Which of the following is NOT a greenhouse gas?',
        'options' => [
            'A' => 'Methane',
            'B' => 'Nitrous Oxide',
            'C' => 'Oxygen',
            'D' => 'Carbon Dioxide'
        ],
        'answer' => 'C',
        'explanation' => 'Oxygen (O₂) is essential for life and makes up about 21% of Earth\'s atmosphere, but it does not significantly contribute to the greenhouse effect. Greenhouse gases, like methane (CH₄), nitrous oxide (N₂O), and carbon dioxide (CO₂), absorb and re-emit infrared radiation, trapping heat in the atmosphere. Oxygen, by contrast, does not absorb infrared radiation efficiently, thus playing virtually no role in atmospheric warming. Understanding which gases contribute to global warming is crucial for developing strategies to reduce emissions and mitigate climate change.'
    ]
];

if (!isset($questions[$q])) {
    header('Location: quiz1.php?q=1'); 
    exit();
}

// Initialize score
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

//Variable to control feedback
$showFeedback = false;
$isCorrect = false;
$selected = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected = $_POST['answer'] ?? '';
    $correctAnswer = $questions[$q]['answer'];

    if ($selected === $correctAnswer) {
        $_SESSION['score']++;
        $isCorrect = true;
    } 
    $showFeedback = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz | Understanding Climate Change</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../client/css/style.css">
    <link rel="stylesheet" href="../client/css/academy.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="border-bottom: 1px solid #ccc;">
            <div class="navbar-brand">
                <img src="../assets/images/Logo.png" style="height: 3.7em" alt="FutureEarth Logo">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../client/html/index.html">Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="../client/html/academy.html">Academy</a></li>
                    <li class="nav-item"><a class="nav-link" href="../client/html/news.html">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="../client/html/event.html">Event</a></li>
                    <li class="nav-item"><a class="nav-link" href="./calculator.php">Calculator</a></li>
                </ul>
            </div>
    </nav>


    <video autoplay muted loop id="bg-video">
        <source src="../assets/videos/quiz1_video.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>


    <!-- Section Container -->
    <div>
        <!-- Quiz Container -->
        <div class = 'container-fluid quiz-container pt-2 text-center'>

            <h2 class="container pt-4 pb-4" style="font-weight: bolder; color:rgb(205, 250, 206);;  letter-spacing: .12rem;">Quiz 1 : Understanding Climate Change</h2>

            <div class="container quiz-card-wrapper mt-3">
                <div class="card quiz-card pb-2">
                    <div class="card-body mt-2">
                        <h4  class="card-title mb-4" style ="font-weight:bold; color:black; letter-spacing: .12rem;">Question <?php echo $q ?>/<?php echo count($questions); ?> </h4>
                        <p class='card-text lead pb-1'style="font-weight:500; color:rgb(77, 77, 77)"><?php echo $questions[$q]['question']?></p>
                        
                        <form method="POST" action="quiz1.php?q=<?php echo $q; ?>" class='mb-4'>
                            <?php foreach ($questions[$q]['options'] as $key => $option): ?>
                                <?php
                                $btnClass = 'btn btn-option';
                                if ($showFeedback) {
                                    if ($selected === $key && $key === $questions[$q]['answer']) {
                                        $btnClass .= ' correct-option'; // Selected and correct
                                    } elseif ($selected === $key && $key !== $questions[$q]['answer']) {
                                        $btnClass .= ' wrong-option'; // Selected but wrong
                                    } else {
                                        $btnClass .= ' disabled-option'; // Other options disabled
                                    }
                                }
                            ?>

                                <div class="form-check mb-3 pb-1">
                                    <button type="button" class="<?php echo $btnClass; ?>" data-answer="<?php echo $key; ?>"<?php echo $showFeedback ? 'disabled' : ''; ?>>
                                        <?php echo "$key) $option"; ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>

                            <input type="hidden" name="answer" value="" id="selectedAnswer">
                        </form>

                        <hr class = 'pb-3' style="border-color: #acacac;"/>

                        <?php if ($showFeedback): ?>
                            <div class="explanation-section mt-1 p-3 text-left mx-4" style="background-color:rgb(233, 231, 231); border-radius:10px">
                               <div class='explanation-content mx-2 my-1'>
                               <h5 class="pb-2" style="font-weight: bold; 
                                    color: <?php echo $isCorrect ? '#28a745' : '#dc3545'; ?>;">
                                    <?php echo $isCorrect ? '✅ Correct!' : '❌ Incorrect.'; ?>
                                </h5>

                                        <h6 class="pt-1 ml-1"><strong>Explanation :</br></strong></h6>
                                        <p class='ml-1' id="explanation"><?php echo $questions[$q]['explanation']; ?></p>
                                        
                                        <?php if ($q == count($questions)): ?>
                                            <button class="btn btn-primary mt-3 mb-1" onclick="showFinalScore()">Finish Quiz</button>
                                            <?php else: ?>
                                            <a href="quiz1.php?q=<?php echo $q + 1; ?>" class="btn btn-primary mt-3 mb-1">Next Question</a>
                                        <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
                
    <script>
            $(document).ready(function() {
                $('.btn-option').click(function() {
                    
                    $('.btn-option').removeClass('active');

                    // Add active class to the clicked button
                    $(this).addClass('active');

                    // Store the selected answer
                    var selectedAnswer = $(this).data('answer');
                    $('#selectedAnswer').val(selectedAnswer);

                    // Submit the form automatically
                    $(this).closest('form').submit();
                });
           
                <?php if ($showFeedback): ?>
                Swal.fire({
                    title: '<?php echo $isCorrect ? "Correct !" : "Incorrect"; ?>',
                    icon: '<?php echo $isCorrect ? "success" : "error"; ?>',
                    confirmButtonText: 'OK'
                    }).then(() => {
                    // Scroll to the explanation section with a slight offset
                    const explanation = document.getElementById('explanation');
                    if (explanation) {
                    window.scrollTo({
                        top: explanation.offsetTop - 550,  // Adjust the 50 for the offset (e.g., fixed header)
                        behavior: 'smooth'
                        });
                    }
                });
                <?php endif; ?>
    });
  
    function showFinalScore() {
        var score = <?php echo $_SESSION['score']; ?>;  
        var totalQuestions = <?php echo count($questions); ?>;  

        Swal.fire({
            title: 'Quiz Completed!',
            text: `You scored ${score}/${totalQuestions}!`,  
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(() => {
            window.location.href = './reset_quiz.php';  
        });
    }
    </script>

    <footer class="bg-dark text-light pt-4 pb-3">
            <div class="container">

                <div class="row mt-2">
                    <!-- About -->
                    <div class="col-md-4">
                        <h5><strong>About FutureEarth</strong></h5>
                        <p style="line-height: 1.6; color: #c7c7c7;">
                        FutureEarth is a youth-driven platform that raises awareness about the environmental crisis and empowers individuals to take climate action through education, updates, and tools.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4 text-center">
                        <h5><strong>Quick Link</strong></h5>
                        <ul class="list-unstyled">
                            <li><a href="../client/html/index.html" class="text-light">Home</a></li>
                            <li><a href="../client/html/academy.html" class="text-light">Academy</a></li>
                            <li><a href="../client/html/news.html" class="text-light">News</a></li>
                            <li><a href="../client/html/event.html" class="text-light">Event</a></li>
                            <li><a href="./server/calculator.php" class="text-light">Calculator</a></li>
                        </ul>
                    </div>

                    <!-- Contact & Social -->
                    <div class="col-md-4">
                        <h5><strong>Connect With Us</strong></h5>
                        <p>Email: <a href="mailto:info@futureearth.org" class="text-light">info@futureearth.org</a></p>
                        <div class="social">
                            <a href="#" class="text-light mr-2" ><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-light mr-2"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-light mr-2"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
                        </div>
                    </div>
                </div>

                <hr class="bg-light">

                <div class="row text-center">
                    <div class="col-md-12">
                        <p class="mb-0">&copy; 2025 FutureEarth. All rights reserved.</p>
                    </div>
                </div>

            </div>
        </footer>

</body>
</html>