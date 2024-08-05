<div class="app-header-inner">
    <div class="container-fluid py-2">
        <div class="app-header-content">

            <div class="row justify-content-between align-items-center">
                <!--//col-->
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fas fa-search"></i>
                </div>
                <!--//col-->
                <div class="app-search-box col">
                    <form class="app-search-form">
                        <input type="text" placeholder="Recherche..." name="search" class="form-control search-input">
                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                class="fas fa-search"></i></button>
                    </form>
                </div>
                <!--//app-search-box-->

                <div class="app-utilities col-auto ">

                    <div class="app-utility-item app-notifications-dropdown dropdown">
                        <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
                           data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
                           title="Notifications">
                            <!-- Icône Bell de Bootstrap avec un badge -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                                <path fill-rule="evenodd"
                                      d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            <!-- Badge pour indiquer le nombre de notifications non lues -->
                            <span class="icon-badge">{{ Auth::user()->unreadNotifications->count() }}</span>
                        </a>
                        <!-- Menu déroulant des notifications -->
                        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                            <div class="dropdown-menu-header p-3">
                                <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                            </div>
                            <!-- Contenu des notifications -->
                            <div class="dropdown-menu-content">
                                @forelse (Auth::user()->notifications as $notification)
                                    <div class="item p-3">
                                        <div class="row gx-2 justify-content-between align-items-center">
                                            <div class="col">
                                                <div class="info">
                                                    <div class="desc">{{ $notification->data['message'] }}</div>
                                                    <div class="meta">{{ $notification->created_at->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="link-mask" href="#"></a>
                                    </div>
                                @empty
                                    <div class="item p-3">
                                        <div class="row gx-2 justify-content-between align-items-center">
                                            <div class="col">
                                                <div class="info">
                                                    <div class="desc">Aucune nouvelle notification.</div>
                                                    <div class="meta">-</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="link-mask" href="#"></a>
                                    </div>
                                @endforelse
                            </div>
                            <!-- Pied de page du menu déroulant -->
                            <div class="dropdown-menu-footer p-2 text-center">
                                <a href="{{ route('notifications') }}">Voir tout</a>
                            </div>
                        </div>
                        <!-- Fin du menu déroulant -->
                    </div>
                    <!--//app-utility-item-->

                    <div class="app-utility-item app-user-dropdown dropdown ">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
                            role="button" aria-expanded="false"><img src="https://ui-avatars.com/api/?name={{ auth('agence')->user()->email }}
                            " alt="user profile" style="border-radius:50%"></a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item" href="{{route('AgenceLogout')}}">Se déconnecter</a></li>
                        </ul>
                    </div>
                    <!--//app-user-dropdown-->
                </div>
                <!--//app-utilities-->
            </div>
            <!--//row-->
        </div>
        <!--//app-header-content-->
    </div>
    <!--//container-fluid-->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notificationDropdown = document.getElementById('notifications-dropdown-toggle');
        notificationDropdown.addEventListener('click', function () {
            fetch('{{ route('notifications.markAllAsRead') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    document.querySelector('.icon-badge').textContent = '0';
                }
            });
        });
    });
</script>
