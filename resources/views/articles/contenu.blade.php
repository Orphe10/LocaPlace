@extends('agence.dashboard.home')

@section('content')

<div class="container-xl contenu">
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total des articles</h4>
                    <div class="stats-figure">{{$articles->count()}}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('ArticleIndex') }}"></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">articles Loués</h4>
                    <div class="stats-figure">{{$louer->count()}}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('ArticleIndex') }}"></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">articles non Loués</h4>
                    <div class="stats-figure">{{$Nlouer->count()}}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('ArticleIndex') }}"></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">articles reservés</h4>
                    <div class="stats-figure">{{$Reserver->count()}}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('ArticleIndex') }}"></a>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-progress-list h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Progression</h4>
                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <div class="card-header-action">
                                <a href="{{route('AgenceDashboard')}}">Tous les articles</a>
                            </div>
                            <!--//card-header-actions-->
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body">
                    <div class="item p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="title mb-1">Articles ajoutés</div>
                                <div class="progress">
                                    <div id="progress-added" class="progress-bar bg-success" role="progressbar"
                                        style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="title mb-1">Articles loués</div>
                                <div class="progress">
                                    <div id="progress-rented" class="progress-bar bg-success" role="progressbar"
                                        style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="title mb-1">Articles réservés</div>
                                <div class="progress">
                                    <div id="progress-reserved" class="progress-bar bg-success" role="progressbar"
                                        style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-stats-table h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Statistique des Articles</h4>
                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <div class="card-header-action">
                                <a href="{{route('AgenceDashboard')}}">Tous les listes</a>
                            </div>
                            <!--//card-header-actions-->
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th class="meta">Source</th>
                                    <th class="meta stat-cell">Vues</th>
                                    <th class="meta stat-cell">Aujourd'hui</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#">tous les articles</a></td>
                                    <td class="stat-cell">110</td>
                                    <td class="stat-cell">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-arrow-up text-success" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                        </svg>
                                        30%
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">articles réservés</a></td>
                                    <td class="stat-cell">67</td>
                                    <td class="stat-cell">23%</td>
                                </tr>
                                <tr>
                                    <td><a href="#">articles loués</a></td>
                                    <td class="stat-cell">56</td>
                                    <td class="stat-cell">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-arrow-down text-danger" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                        </svg>
                                        20%
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">articles non loués</a></td>
                                    <td class="stat-cell">24</td>
                                    <td class="stat-cell">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#">articles en cours</a></td>
                                    <td class="stat-cell">17</td>
                                    <td class="stat-cell">15%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>
    <!--//row-->
    {{-- <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Exemple de graphique linéaire</h4>
                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <div class="card-header-action">
                                <a href="charts.html">Plus de graphiques</a>
                            </div>
                            <!--//card-header-actions-->
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="mb-3 d-flex">
                        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                            <option value="1" selected>Cette semaine</option>
                            <option value="2">Aujourd'hui</option>
                            <option value="3">Ce mois-ci</option>
                            <option value="3">Cette année</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="canvas-linechart"></canvas>
                    </div>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Exemple de graphique à barres</h4>
                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <div class="card-header-action">
                                <a href="charts.html">Plus de graphiques</a>
                            </div>
                            <!--//card-header-actions-->
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="mb-3 d-flex">
                        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                            <option value="1" selected>Cette semaine</option>
                            <option value="2">Aujourd'hui</option>
                            <option value="3">Ce mois-ci</option>
                            <option value="3">Cette année</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="canvas-barchart"></canvas>
                    </div>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->

    </div> --}}
    <!--//row-->
</div>
<style>
    a {
        color: blue;
    }

    a:hover {
        color: blue;
    }

    .contenu {
        margin-left: 15px;
    }

    #canvas-barchart {
        color: blue;

    }
</style>
<script>
    // Définition initiale des données des articles
    let articlesData = {
        added: 0,
        rented: 0,
        reserved: 0
    };

    // Fonction pour mettre à jour les barres de progression
    function updateProgress() {
        const maxArticles = 100; // Ajustez cette valeur selon vos besoins

        const addedProgress = (articlesData.added / maxArticles) * 100;
        const rentedProgress = (articlesData.rented / maxArticles) * 100;
        const reservedProgress = (articlesData.reserved / maxArticles) * 100;

        document.getElementById('progress-added').style.width = addedProgress + '%';
        document.getElementById('progress-added').setAttribute('aria-valuenow', addedProgress);

        document.getElementById('progress-rented').style.width = rentedProgress + '%';
        document.getElementById('progress-rented').setAttribute('aria-valuenow', rentedProgress);

        document.getElementById('progress-reserved').style.width = reservedProgress + '%';
        document.getElementById('progress-reserved').setAttribute('aria-valuenow', reservedProgress);
    }

    // Fonction pour récupérer les données du serveur
    function fetchData() {
        fetch('/agence/dashboard/api/getArticlesData')
            .then(response => response.json())
            .then(data => {
                articlesData.added = data.addedArticles;
                articlesData.rented = data.rentedArticles;
                articlesData.reserved = data.reservedArticles;
                updateProgress();
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Appel pour charger les données au chargement de la page
    document.addEventListener('DOMContentLoaded', fetchData);

    // Exemple de fonction pour ajouter un article
    function addArticle() {
        fetch('/agence/dashboard/api/addArticle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchData();
            }
        })
        .catch(error => console.error('Error adding article:', error));
    }

    // Exemple de fonction pour mettre à jour le statut d'un article
    function updateArticleStatus(status) {
        fetch('/agence/dashboard/api/updateArticleStatus', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchData();
            }
        })
        .catch(error => console.error('Error updating article status:', error));
    }
    /*Pour la couleur des graphiques*/
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('canvas-barchart').getContext('2d');

        var chartData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3, 7, 8, 6, 4, 10, 12],
                backgroundColor: 'blue',  // Initial color
                borderColor: 'rgba(75, 192, 192, 1)',  // Initial color
                borderWidth: 1
            }]
        };

        var chart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.getElementById('timeframe-select').addEventListener('change', function () {
            var timeframe = this.value;
            var newBackgroundColor, newBorderColor;

            switch (timeframe) {
                case '1':
                    newBackgroundColor = 'rgba(75, 192, 192, 0.2)';
                    newBorderColor = 'rgba(75, 192, 192, 1)';
                    break;
                case '2':
                    newBackgroundColor = 'rgba(255, 99, 132, 0.2)';
                    newBorderColor = 'rgba(255, 99, 132, 1)';
                    break;
                case '3':
                    newBackgroundColor = 'rgba(54, 162, 235, 0.2)';
                    newBorderColor = 'rgba(54, 162, 235, 1)';
                    break;
                case '4':
                    newBackgroundColor = 'rgba(255, 206, 86, 0.2)';
                    newBorderColor = 'rgba(255, 206, 86, 1)';
                    break;
                default:
                    newBackgroundColor = 'rgba(75, 192, 192, 0.2)';
                    newBorderColor = 'rgba(75, 192, 192, 1)';
            }

            chart.data.datasets[0].backgroundColor = newBackgroundColor;
            chart.data.datasets[0].borderColor = newBorderColor;
            chart.update();
        });
    });
</script>

@endsection
