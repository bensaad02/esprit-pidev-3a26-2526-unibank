<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/comptes' => [[['_route' => 'app_admin_comptes', '_controller' => 'App\\Controller\\Admin\\AdminCompteController::index'], null, null, null, false, false, null]],
        '/admin/contrats' => [[['_route' => 'app_admin_contrats', '_controller' => 'App\\Controller\\Admin\\AdminContratController::index'], null, null, null, false, false, null]],
        '/admin/credits' => [[['_route' => 'app_admin_credits', '_controller' => 'App\\Controller\\Admin\\AdminCreditController::index'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\Admin\\AdminDashboardController::dashboard'], null, null, null, false, false, null]],
        '/admin/transactions' => [[['_route' => 'app_admin_transactions', '_controller' => 'App\\Controller\\Admin\\AdminTransactionController::index'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'app_admin_users', '_controller' => 'App\\Controller\\Admin\\AdminUserController::list'], null, null, null, false, false, null]],
        '/admin/users/pending' => [[['_route' => 'app_admin_pending', '_controller' => 'App\\Controller\\Admin\\AdminUserController::pending'], null, null, null, false, false, null]],
        '/client/dashboard' => [[['_route' => 'app_client_dashboard', '_controller' => 'App\\Controller\\Client\\ClientDashboardController::dashboard'], null, null, null, false, false, null]],
        '/client/compte' => [[['_route' => 'app_client_compte', '_controller' => 'App\\Controller\\Client\\CompteController::index'], null, null, null, false, false, null]],
        '/client/compte/type' => [[['_route' => 'app_client_compte_type', '_controller' => 'App\\Controller\\Client\\CompteController::changeType'], null, ['POST' => 0], null, false, false, null]],
        '/client/credits' => [[['_route' => 'app_client_credits', '_controller' => 'App\\Controller\\Client\\CreditController::index'], null, null, null, false, false, null]],
        '/client/credits/apply' => [[['_route' => 'app_client_credit_apply', '_controller' => 'App\\Controller\\Client\\CreditController::apply'], null, ['POST' => 0], null, false, false, null]],
        '/offers' => [[['_route' => 'app_offers', '_controller' => 'App\\Controller\\Client\\OffersController::index'], null, null, null, false, false, null]],
        '/offers/select' => [[['_route' => 'app_offers_select', '_controller' => 'App\\Controller\\Client\\OffersController::select'], null, ['POST' => 0], null, false, false, null]],
        '/client/profile' => [[['_route' => 'app_client_profile', '_controller' => 'App\\Controller\\Client\\ProfileController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/client/profile/password' => [[['_route' => 'app_client_password', '_controller' => 'App\\Controller\\Client\\ProfileController::password'], null, ['POST' => 0], null, false, false, null]],
        '/client/transactions' => [[['_route' => 'app_client_transactions', '_controller' => 'App\\Controller\\Client\\TransactionController::index'], null, null, null, false, false, null]],
        '/client/transactions/submit' => [[['_route' => 'app_client_transaction_submit', '_controller' => 'App\\Controller\\Client\\TransactionController::submit'], null, ['POST' => 0], null, false, false, null]],
        '/client/transactions/extrait' => [[['_route' => 'app_client_extrait', '_controller' => 'App\\Controller\\Client\\TransactionPdfController::extrait'], null, null, null, false, false, null]],
        '/waiting-approval' => [[['_route' => 'app_waiting_approval', '_controller' => 'App\\Controller\\Client\\WaitingApprovalController::index'], null, null, null, false, false, null]],
        '/waiting-approval/check' => [[['_route' => 'app_waiting_check', '_controller' => 'App\\Controller\\Client\\WaitingApprovalController::check'], null, ['POST' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/verification' => [[['_route' => 'app_verification', '_controller' => 'App\\Controller\\VerificationController::verify'], null, null, null, false, false, null]],
        '/verification/resend' => [[['_route' => 'app_verification_resend', '_controller' => 'App\\Controller\\VerificationController::resend'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|c(?'
                        .'|o(?'
                            .'|mptes/([^/]++)/(?'
                                .'|toggle(*:244)'
                                .'|depot(*:257)'
                                .'|retrait(*:272)'
                            .')'
                            .'|ntrats/([^/]++)/pdf(*:300)'
                        .')'
                        .'|redits/([^/]++)/(?'
                            .'|approve(*:335)'
                            .'|reject(*:349)'
                            .'|finalize(*:365)'
                            .'|contract\\-pdf(*:386)'
                        .')'
                    .')'
                    .'|transactions/([^/]++)/delete(*:424)'
                    .'|users/([^/]++)/(?'
                        .'|edit(*:454)'
                        .'|ban(*:465)'
                        .'|delete(*:479)'
                        .'|approve(*:494)'
                        .'|reject(*:508)'
                    .')'
                .')'
                .'|/client/(?'
                    .'|credits/([^/]++)/(?'
                        .'|c(?'
                            .'|ontract\\-choice(*:568)'
                            .'|ancel(*:581)'
                        .')'
                        .'|modify(*:596)'
                        .'|pdf(*:607)'
                        .'|delete(*:621)'
                    .')'
                    .'|transactions/receipt/([^/]++)(*:659)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        244 => [[['_route' => 'app_admin_compte_toggle', '_controller' => 'App\\Controller\\Admin\\AdminCompteController::toggle'], ['id'], ['POST' => 0], null, false, false, null]],
        257 => [[['_route' => 'app_admin_compte_depot', '_controller' => 'App\\Controller\\Admin\\AdminCompteController::depot'], ['id'], ['POST' => 0], null, false, false, null]],
        272 => [[['_route' => 'app_admin_compte_retrait', '_controller' => 'App\\Controller\\Admin\\AdminCompteController::retrait'], ['id'], ['POST' => 0], null, false, false, null]],
        300 => [[['_route' => 'app_admin_contrat_pdf', '_controller' => 'App\\Controller\\Admin\\AdminContratController::downloadPdf'], ['id'], null, null, false, false, null]],
        335 => [[['_route' => 'app_admin_credit_approve', '_controller' => 'App\\Controller\\Admin\\AdminCreditController::approve'], ['id'], ['POST' => 0], null, false, false, null]],
        349 => [[['_route' => 'app_admin_credit_reject', '_controller' => 'App\\Controller\\Admin\\AdminCreditController::reject'], ['id'], ['POST' => 0], null, false, false, null]],
        365 => [[['_route' => 'app_admin_credit_finalize', '_controller' => 'App\\Controller\\Admin\\AdminCreditController::finalize'], ['id'], ['POST' => 0], null, false, false, null]],
        386 => [[['_route' => 'app_admin_credit_pdf', '_controller' => 'App\\Controller\\Admin\\AdminCreditController::downloadPdf'], ['id'], null, null, false, false, null]],
        424 => [[['_route' => 'app_admin_transaction_delete', '_controller' => 'App\\Controller\\Admin\\AdminTransactionController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        454 => [[['_route' => 'app_admin_user_edit', '_controller' => 'App\\Controller\\Admin\\AdminUserController::edit'], ['id'], ['POST' => 0], null, false, false, null]],
        465 => [[['_route' => 'app_admin_user_ban', '_controller' => 'App\\Controller\\Admin\\AdminUserController::ban'], ['id'], ['POST' => 0], null, false, false, null]],
        479 => [[['_route' => 'app_admin_user_delete', '_controller' => 'App\\Controller\\Admin\\AdminUserController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        494 => [[['_route' => 'app_admin_user_approve', '_controller' => 'App\\Controller\\Admin\\AdminUserController::approve'], ['id'], ['POST' => 0], null, false, false, null]],
        508 => [[['_route' => 'app_admin_user_reject', '_controller' => 'App\\Controller\\Admin\\AdminUserController::reject'], ['id'], ['POST' => 0], null, false, false, null]],
        568 => [[['_route' => 'app_client_credit_contract', '_controller' => 'App\\Controller\\Client\\CreditController::contractChoice'], ['id'], ['POST' => 0], null, false, false, null]],
        581 => [[['_route' => 'app_client_credit_cancel', '_controller' => 'App\\Controller\\Client\\CreditController::cancel'], ['id'], ['POST' => 0], null, false, false, null]],
        596 => [[['_route' => 'app_client_credit_modify', '_controller' => 'App\\Controller\\Client\\CreditController::modify'], ['id'], ['POST' => 0], null, false, false, null]],
        607 => [[['_route' => 'app_client_credit_pdf', '_controller' => 'App\\Controller\\Client\\CreditController::downloadPdf'], ['id'], null, null, false, false, null]],
        621 => [[['_route' => 'app_client_credit_delete', '_controller' => 'App\\Controller\\Client\\CreditController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        659 => [
            [['_route' => 'app_client_receipt', '_controller' => 'App\\Controller\\Client\\TransactionPdfController::receipt'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
