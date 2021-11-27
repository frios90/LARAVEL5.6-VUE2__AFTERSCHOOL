<?php
     Route::get('login', function () {
        return view('web.main_index');
    })->name('login');
    Route::get('/', function () {
        return view('web.main_index');
    });
    Route::get('/about', function () {
        return view('web.main_about');
    });
    Route::get('/talleres', function () {
        return view('web.main_courses');
    });
    Route::get('/glifing', function () {
        return view('web.main_glifing');
    });
    Route::get('/equip', function () {
        return view('web.main_equip');
    });
    Route::get('/work-with-us', function () {
        return view('web.work_with_us');
    });
    Route::post('/sing-in', [ 'as' => '/sing-in', 'uses' => 'Auth\LoginController@singIn']);

    Route::get('/block', [ 'as' => '/block', 'uses' => 'Auth\LoginController@block']);
    Route::post('/request-pass', [ 'as' => '/request-pass', 'uses' => 'Auth\LoginController@requestPass']);
    Route::post('/log-out', [ 'as' => '/log-out', 'uses' => 'Auth\LoginController@logOut']);
    Route::post('/contact-mail', 'MailController@contactMail')->name('/contact-mail');
    Route::post('/send-wwu', 'MailController@wwuMail')->name('/send-wwu');

    Route::get('/changepass', 'Auth\LoginController@changePass');
    Route::post('/confirmchangepass', 'Auth\LoginController@confirmChangePass')->name('/confirmchangepass');
    Route::group(['middleware' => ['auth']], function () {
        Route::group(['middleware' => ['boss']], function () {
            Route::get('/schedules',              'ScheduleController@index');
            Route::get('/getCalendar',            'ScheduleController@getCalendar');
            Route::get('/getDayLessons',          'ScheduleController@getDayLessons');
            Route::post('/postLesson',            'ScheduleController@postLesson');
            Route::post('/deleteLesson',          'ScheduleController@deleteLesson');
            Route::post('/validateDayToRepeat',   'ScheduleController@validateDayToRepeat');
            Route::post('/deleteAlumnLesson',     'ScheduleController@deleteAlumnLesson');
            Route::post('/addOtherAlumn',         'ScheduleController@addOtherAlumn');
            Route::post('/changeHourLesson',      'ScheduleController@changeHourLesson');
            Route::post('/validateAlumnInLesson', 'ScheduleController@validateAlumnInLesson');
            Route::post('/changeZoomLink',        'ScheduleController@changeZoomLink');
            Route::post('/cancelLesson',          'ScheduleController@cancelLesson');

            Route::get('/attorneis',         'UserController@index');
            Route::get('/alumns',            'UserController@index');
            Route::get('/teachers',          'UserController@index');
            Route::get('/courses',           'UserController@index');
            Route::get('/users',             'UserController@index');
            Route::get('/user-table-list',   'UserController@getTableList');
            Route::post('/user-store',       'UserController@store');
            Route::post('/user-status',      'UserController@status');
            Route::get('/course-table-list', 'CourseController@getTableList');
            Route::post('/course-store',     'CourseController@store');
            Route::post('/course-status',    'CourseController@status');


        });
        Route::get('/hasAccessPermissions', 'DashboardController@hasAccessPermissions');
        Route::get('/dashboard',            'DashboardController@getDashboard')->name('dashboard');
        Route::get('/me',                   'DashboardController@getDashboard')->name('me');
        Route::get('/getNextClass',         'DashboardController@getNextClass');
        Route::get('/getMe',                'UserController@getMe');
        Route::post('/mePassStore',         'UserController@mePassStore');

        Route::get('/getUserSession', 'UserController@getUserSession');

        /**Rutas de paises */
        Route::get('/country-list', 'CountryController@getList')->name('/country-list');

        /**Rutas de región */
        Route::get('/region-list',  'RegionController@getList')->name('/region-list');

        /**Rutas de comunas */
        Route::get('/commune-list', 'CommuneController@getList')->name('/commune-list');
        
            
    });





