<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UY - Pomodoro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <style>
        .timer {
            text-align: center;
            font-size: 48px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Pomodoro</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="timer" id="timer">25:00</div>
                <div class="buttons">
                    <button class="btn btn-primary" id="startBtn">Başlat</button>
                    <button class="btn btn-secondary" id="pauseBtn">Dur</button>
                    <button class="btn btn-danger" id="resetBtn">Sıfırla</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script>
        var timerInterval;
        var timerElement = document.getElementById('timer');
        var startBtn = document.getElementById('startBtn');
        var pauseBtn = document.getElementById('pauseBtn');
        var resetBtn = document.getElementById('resetBtn');
        var minutes = 25;
        var seconds = 0;

        startBtn.addEventListener('click', function() {
            startTimer();
        });

        pauseBtn.addEventListener('click', function() {
            pauseTimer();
        });

        resetBtn.addEventListener('click', function() {
            resetTimer();
        });

        function startTimer() {
            startBtn.disabled = true;
            pauseBtn.disabled = false;

            timerInterval = setInterval(function() {
                if (seconds === 0) {
                    if (minutes === 0) {
                        clearInterval(timerInterval);
                        alert('Pomodoro completed!');
                        resetTimer();
                    } else {
                        minutes--;
                        seconds = 59;
                    }
                } else {
                    seconds--;
                }

                timerElement.innerHTML = padZero(minutes) + ':' + padZero(seconds);
            }, 1000);
        }

        function pauseTimer() {
            clearInterval(timerInterval);
            startBtn.disabled = false;
            pauseBtn.disabled = true;
        }

        function resetTimer() {
            clearInterval(timerInterval);
            minutes = 25;
            seconds = 0;
            timerElement.innerHTML = padZero(minutes) + ':' + padZero(seconds);
            startBtn.disabled = false;
            pauseBtn.disabled = true;
        }

        function padZero(num) {
            return (num < 10 ? '0' : '') + num;
        }
    </script>
</body>

</html>