<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail employé</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition employedetail-page">
    <div class="employedetail-box">
        <div class="card">
            <div class="card-body employedetail-card-body">
                <p class="employedetail-box-msg">
                <h1 class="">Détail employé</h1>
                </p><br />

                <section class="main">
                    <h2 class="">Informations personnelles</h2>

                    <ul class="">
                        Prénom : {{ $showEmploye->firstname }}<br />
                        Nom : {{ $showEmploye->lastname }}<br />
                        Adresse E-mail : {{ $showEmploye->email }}<br />
                        Numéro de téléphone : +226 {{ $showEmploye->telephone }}<br />
                        Numéro matricule : {{ $showEmploye->matricule }}
                    </ul>
                </section>

                <hr>

                <div class="employedetail-box-close">
                    <table>
                        <tr>
                            <td>
                                <form action="{{ route('myemployeloans', $showEmploye->id) }}" method="GET">
                                    @csrf

                                    <button type="submit">VOIR LE DÉTAIL DES PRÊTS</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('myemployes') }}" method="GET">
                                    @csrf

                                    <button type="submit">FERMER</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
