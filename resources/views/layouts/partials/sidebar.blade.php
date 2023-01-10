<div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Tableau de bord</li>
                        <a href="/" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text"> Tableau de bord</span>
                        </a>
                    <li>

                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Authentification</span>
                        </a>
                        <ul aria-expanded="false">
                           
                            <li><a href="{{ route('roles.index') }}">Gestion des Rôles</a></li>
                            <li><a href="{{ route('alladminsup') }}">Gestion des administrateurs</a></li>
                           


                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Configuration</span>
                        </a>
                        <ul aria-expanded="false">
                              <li><a href="{{ route('alldocument') }}">Gestion des documents</a></li>
                        </ul>
                        <ul aria-expanded="false">
                                <li><a href="{{ route('allrate') }}">Gestion des taux</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route ('allbank') }}">Gestion des banques</a></li>
                        </ul>

                        <ul aria-expanded="false">
                              <li><a href="{{ route('allrepaymentamount') }}">Voir la grille</a></li>
                        </ul>

                    </li>


                    <li><a href="{{ route('allemployer') }}">  <i class="icon-speedometer menu-icon"></i>Gestion des employeurs</a></li>


                    <li><a href="{{ route('alldebtor') }}">  <i class="icon-speedometer menu-icon"></i>Gestion des redevables</a></li>

                    <li><a href="{{ route('quick-task') }}">  <i class="icon-speedometer menu-icon"></i>Paiement rapide</a></li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Reporting</span>
                        </a>

                    </li>


                </ul>
            </div>
        </div>
