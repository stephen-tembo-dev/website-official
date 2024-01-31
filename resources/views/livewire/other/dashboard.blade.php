<div>
    <div class="container">

    <p class="light-deca mt center"> <b>Hi, Lavu Mweemba</b></p>

        <div class="row mt">

            <div class="col m4 s12">
                <div class="card-panel dbrd-card align-center hoverable"> 
                    <p class="light-deca">Editors</p>
                    <h5>4</h5>
                </div>
            </div>

            <div class="col m4 s12">
                <div class="card-panel dbrd-card align-center hoverable">
                <p class="light-deca">Viewers</p>
                    <h5>2</h5>
                </div>
            </div>

            <div class="col m4 s12">
                <div class="card-panel dbrd-card align-center hoverable">
                <p class="light-deca">News articles</p>
                    <h5>10</h5>
                </div>
            </div>

            <div class="col m4 s12">
                <div class="card-panel dbrd-card align-center hoverable"> 
                <p class="light-deca">Events</p>
                    <h5>5</h5>
                </div>
            </div>

            <div class="col m4 s12">
                <div class="card-panel dbrd-card align-center hoverable"> 
                <p class="light-deca">Visitor count</p>
                    <h5>100</h5>
                </div>
            </div>

            <div class="col m4 s12">
                <div class="card-panel dbrd-card align-center hoverable">
                <p class="light-deca">Mails sent</p>
                    <h5>52</h5>
                </div>
            </div>

        </div>

        <p class="light-deca mt center"> <b>Statistics</b></p>

        <div class="row mt">

        <div class="col m8 s12">
                <div class="card-panel dbrd-card hoverable mt mb">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
    </div>




    <style>
        .dbrd-card {
            border-radius: 10px;
            padding: 10px;
        }

    </style>
</div>

@script 

<script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fed', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'monthly visitors',
                    data: [150, 320, 160, 240, 200],
                    borderWidth: 3,
                    borderColor: '#DC7B12',
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false, // Disable grid lines on the X-axis
                        },
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false, // Disable grid lines on the X-axis
                        },
                    }
                }
            }
        });
    </script>

@endscript
