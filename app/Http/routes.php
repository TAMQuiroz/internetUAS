<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/newlook', function (){
    return view('base');
});

Route::get('/', function (){
    if (Auth::check())
        Auth::logout();

    return view('welcome');
});

Route::get('/login', function (){

    if (Auth::check())
        Auth::logout();
    return view('welcome');
});

Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('/logout', function(){
    if (Auth::check()){
        Auth::logout();
        Session::forget('user');
    }
    return redirect('/');
});

Route::get('/password_reset/{token}', 'User\UserController@passwordForm');
Route::post('/password_reset', 'User\UserController@resetPassword');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/improvement', function() {
        return view('improvement');
    });

    Route::get('/new', function() {
        return view('newimprovement');
    });

    Route::group(['prefix' => 'myfaculties'], function() {
        Route::get('/', ['as' => 'index.subindex', 'uses' => 'Subindex\SubindexController@index']);
    });

    Route::group(['prefix' => 'home'], function() {
        Route::get('/', ['as' => 'layout.master', 'uses' => 'Home\HomeController@home']);
    });


    //Rubric Routes
    Route::group(['prefix' => 'rubrics'], function() {

        Route::get('/', ['as' => 'index.rubrics', 'uses' => 'Rubric\RubricController@index']);
        Route::get('/createRubric', ['as' => 'createRubric.rubrics', 'uses' => 'Rubric\RubricController@create']);
        Route::post('/save', ['as' => 'saveRubric.rubrics', 'uses' => 'Rubric\RubricController@save']);
        Route::get('/editRubric', ['as' => 'editRubric.rubrics', 'uses' => 'Rubric\RubricController@edit']);
        Route::post('/updateRubric', ['as' => 'updateRubric.rubrics', 'uses' => 'Rubric\RubricController@update']);
        Route::get('/viewRubric', ['as' => 'viewRubric.rubrics', 'uses' => 'Rubric\RubricController@view']);
        Route::get('/chooseRubric', ['as' => 'chooseRubric.rubrics', 'uses' => 'Rubric\RubricController@choose']);
        Route::get('/deleteRubric', ['as' => 'deleteRubric.rubrics', 'uses' => 'Rubric\RubricController@delete']);

        //AJAX routes

        Route::get('/getRubricAspects/{rubricCode}', ['uses' => 'Rubric\RubricController@getRubricAspects']);
        Route::get('/findRE/{idStudentsResult}', ['uses' => 'Rubric\RubricController@findRE']);
        Route::get('/indexByRE/{idStudentsResult}', ['uses' => 'Rubric\RubricController@indexByRE']);
    });


    Route::group(['prefix' => 'cicles'], function() {
        Route::get('/', ['as' => 'index.cicles', 'uses' => 'Cicles\CiclesController@index']);
        Route::get('/new', ['as' => 'new.cicles', 'uses' => 'Cicles\CiclesController@create']);
        Route::get('/edit', ['as' => 'edit.cicles', 'uses' => 'Cicles\CiclesController@edit']);
    });

    //Enhancement Plan Routes
    Route::group(['prefix' => 'enhacementPlan'], function() {
        Route::get('/', ['as' => 'index.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@index']);
        Route::get('/new', ['as' => 'new.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@create']);
        Route::post('/save', ['as' => 'save.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@save']);
        Route::get('/edit', ['as' => 'edit.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@edit']);
        Route::post('/update', ['as' => 'update.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@update']);
        Route::get('/tracing', ['as' => 'tracing.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@tracing']);
        Route::post('/comment', ['as' => 'comment.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@comment']);

        Route::get('/uploadAction', ['as' => 'uploadAction.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@uploadAction']);
        Route::get('/downloadAction', ['as' => 'downloadAction.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@downloadAction']);
        Route::post('/add',[ 'as' => 'addentryA', 'uses' => 'EnhacementPlan\EnhacementController@add']);
        Route::post('/addPlan',[ 'as' => 'addPentryA', 'uses' => 'EnhacementPlan\EnhacementController@addPlan']);
        Route::get('/delete', ['as' => 'delete.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@delete']);
        Route::post('/search', ['as' => 'search.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@search']);

        //AJAX routes

        Route::get('/getEnhacementPlan/{improvementPlanId}', ['uses' => 'EnhacementPlan\EnhacementController@getEnhacementPlan']);
        Route::get('/CiclesAndTeachers', ['uses' => 'EnhacementPlan\EnhacementController@CiclesAndTeachers']);

        Route::get('/addCicle', ['as' => 'add-cicle.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@addCicleNew']);
        Route::get('/{id}/addCicle', ['as' => 'add-cicle-edit.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@addCicleEdit']);
        Route::post('/save-addCicle', ['as' => 'save-cicle.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@saveCicleNew']);
        Route::post('/{id}/editCicle', ['as' => 'save-cicle-edit.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@saveEditCicleNew']);
        Route::get('/{id}/edit', ['as' => 'edit-AddCicle.enhacementPlan', 'uses' => 'EnhacementPlan\EnhacementController@backEdit']);
          
    });

    //DictatedCourses Plan Routes
    Route::group(['prefix' => 'dictatedCourses'], function() {
        Route::get('/', ['as' => 'index.dictatedCourses', 'uses' => 'DictatedCourses\DictatedCoursesController@index']);
        Route::get('/edit', ['as' => 'edit.dictatedCourses', 'uses' => 'DictatedCourses\DictatedCoursesController@edit']);
        Route::post('/update', ['as' => 'update.dictatedCourses', 'uses' => 'DictatedCourses\DictatedCoursesController@update']);
        Route::get('/view', ['as' => 'view.dictatedCourses', 'uses' => 'DictatedCourses\DictatedCoursesController@view']);
        Route::get('/timetable',['as'=>'timetable.dictatedCourses','uses'=>'DictatedCourses\DictatedCoursesController@timetable']);
        Route::post('/register',['as'=>'register.dictatedCourses','uses'=>'DictatedCourses\DictatedCoursesController@register']);
        Route::get('/delete', ['as' => 'delete.dictatedCourses', 'uses' => 'DictatedCourses\DictatedCoursesController@delete']);
        Route::get('/editTimeTable', ['as' => 'editTimeTable.dictatedCourses', 'uses' => 'DictatedCourses\DictatedCoursesController@editTimeTable']);
        Route::post('/updateTimeTable',['as'=>'updateTimeTable.dictatedCourses','uses'=>'DictatedCourses\DictatedCoursesController@updateTimeTable']);

        //AJAX routes

        Route::get('/getCodigo/{codeT}', ['uses' => 'DictatedCourses\DictatedCoursesController@getCodigo']);
    });

    //Measurement Source
    Route::group(['prefix' => 'measurementSource'], function() {
        Route::get('/',['as'=>'index.measurementSource','uses'=>'MeasurementSource\MeasurementSourceController@index']);
        Route::post('/save', ['as' => 'save.measurementSource', 'uses' => 'MeasurementSource\MeasurementSourceController@save']);
        Route::post('/update', ['as' => 'update.measurementSource', 'uses' => 'MeasurementSource\MeasurementSourceController@update']);
        Route::get('/delete', ['as' => 'delete.measurementSource', 'uses' => 'MeasurementSource\MeasurementSourceController@delete']);

        Route::get('/viewMesuringByCourse', ['as' => 'viewMesuringByCourse.measurementSource', 'uses' => 'MeasurementSource\MeasurementSourceController@viewMesuringByCourse']);
        Route::get('/editMesuringByCourse', ['as' => 'editMesuringByCourse.measurementSource', 'uses' => 'MeasurementSource\MeasurementSourceController@editMesuringByCourse']);
        Route::post('/measuringByCourse', ['uses' => 'MeasurementSource\MeasurementSourceController@measuringByCourse']);
        Route::post('/saveMesuringByCourse', ['as' => 'saveMesuringByCourse.measurementSource','uses' => 'MeasurementSource\MeasurementSourceController@saveMesuringByCourse']);

        //AJAX routes

        Route::get('/findMeasuringByCriterion/{idCriterioCurso}', ['uses' => 'MeasurementSource\MeasurementSourceController@findMeasuringByCriterion']);

    });

    //Type Improvement Plan Routes
    Route::group(['prefix' => 'typeImprovement'], function() {
        Route::get('/',['as'=>'index.typeImprovement','uses'=>'TypeImprovementPlan\TypeImprovementPlanController@index']);
        Route::get('/new',['as'=>'new.typeImprovement','uses'=>'TypeImprovementPlan\TypeImprovementPlanController@create']);
        Route::post('/save',['as'=>'save.typeImprovement','uses'=>'TypeImprovementPlan\TypeImprovementPlanController@save']);
        Route::get('/edit',['as'=>'edit.typeImprovement','uses'=>'TypeImprovementPlan\TypeImprovementPlanController@edit']);
        Route::post('/update',['as'=>'update.typeImprovement','uses'=>'TypeImprovementPlan\TypeImprovementPlanController@update']);
        Route::get('/delete', ['as' => 'delete.typeImprovement', 'uses' => 'TypeImprovementPlan\TypeImprovementPlanController@delete']);

        //AYAX routes
        Route::get('/getCode/{code}', ['uses' => 'TypeImprovementPlan\TypeImprovementPlanController@getCode']);
        Route::get('/getTypeImprovementPlan/{typeImprovementPlanId}', ['uses' => 'TypeImprovementPlan\TypeImprovementPlanController@getTypeImprovementPlan']);
    });

    //Study Plan Routes
    Route::group(['prefix' => 'studyPlan'], function() {
        Route::get('/', ['as' => 'index.studyPlan', 'uses' => 'StudyPlan\StudyPlanController@index']);
        Route::get('/view/{course_id}/semester/{semester_id}', ['as' => 'view.studyPlan', 'uses' => 'StudyPlan\StudyPlanController@view']);
        Route::get('/{semester_id}/courses', ['uses' => 'StudyPlan\StudyPlanController@getCourses']);
    });


    //Faculty Routes
    Route::group(['prefix' => 'faculty'], function() {

        // faculty vpopmail_add_domain(domain, dir, uid, gid)
        Route::get('/', ['as' => 'index.faculty', 'uses' => 'Faculty\FacultyController@index']);
        Route::get('/new', ['as' => 'new.faculty', 'uses' => 'Faculty\FacultyController@create']);
        Route::post('/save', ['as' => 'save.faculty', 'uses' => 'Faculty\FacultyController@save']);
        Route::get('/edit', ['as' => 'edit.faculty', 'uses' => 'Faculty\FacultyController@edit']);
        Route::get('/editCoordinator',['as'=>'editCoordinator.faculty','uses'=>'Faculty\FacultyController@editCoordinator']);
        Route::post('/updateCoordinator',['as'=>'updateCoordinator.faculty','uses'=>'Faculty\FacultyController@updateCoordinator']);
        Route::get('/delete/{id}', ['as' => 'delete.faculty', 'uses' => 'Faculty\FacultyController@delete']);
        Route::post('/update', ['as' => 'update.faculty', 'uses' => 'Faculty\FacultyController@update']);
        Route::get('/view/{id}', ['as' => 'view.faculty', 'uses' => 'Faculty\FacultyController@view']);



        // assign faculty
        Route::get('/periods', ['as' => 'viewPeriod.faculty', 'uses' => 'Faculty\FacultyController@getPeriods']);
        Route::get('/periods/create', ['as' => 'createPeriod.faculty', 'uses' => 'Faculty\FacultyController@createPeriod']);
        Route::post('/periods/create', ['as' => 'storePeriod.faculty', 'uses' => 'Faculty\FacultyController@storePeriod']);
        Route::get('/periods/{period_id}', ['as' => 'editPeriod.faculty', 'uses' => 'Faculty\FacultyController@editPeriod']);
        Route::get('/editPeriod', ['as' => 'editPeriod.faculty', 'uses' => 'Faculty\FacultyController@editPeriod']);
        Route::post('/updatePeriod', ['as' => 'updatePeriod.faculty', 'uses' => 'Faculty\FacultyController@updatePeriod']);
        Route::get('/end/period/{period_id}', ['as' => 'endPeriod.faculty', 'uses' => 'Faculty\FacultyController@endPeriod']);

        Route::get('/viewCycle', ['as' => 'viewCycle.faculty', 'uses' => 'Faculty\FacultyController@viewCycle']);
        Route::get('/editCycle', ['as' => 'editCycle.faculty', 'uses' => 'Faculty\FacultyController@editCycle']);
        Route::post('/updateCycle', ['as' => 'updateCycle.faculty', 'uses' => 'Faculty\FacultyController@updateCycle']);


        Route::get('/Assign', ['as' => 'indexAcademicCycle.faculty', 'uses' => 'Faculty\FacultyController@indexAcademicCycle']);
        Route::get('/editAssign', ['as' => 'editAcademicCycle.faculty', 'uses' => 'Faculty\FacultyController@editAcademicCycle']);
        Route::post('/updateAssign', ['as' => 'updateAcademicCycle.faculty', 'uses' => 'Faculty\FacultyController@updateAcademicCycle']);
        Route::post('/saveAssign', ['as' => 'saveAcademicCycle.faculty', 'uses' => 'Faculty\FacultyController@saveAcademicCycle']);
        Route::get('/newAssign', ['as' => 'newAcademicCycle.faculty', 'uses' => 'Faculty\FacultyController@createAcademicCycle']);
        Route::get('/viewAssign/{id}', ['as' => 'viewAcademicCycle.faculty', 'uses' => 'Faculty\FacultyController@viewAcademicCycle']);
        Route::post('/activate', ['as' => 'activate.faculty', 'uses' => 'Faculty\FacultyController@activateCycle']);
        Route::get('/desactivate', ['as' => 'desactivate.faculty', 'uses' => 'Faculty\FacultyController@desactivateCycle']);
        Route::get('/desactivatePeriod', ['as' => 'desactivatePeriod.faculty', 'uses' => 'Faculty\FacultyController@desactivatePeriod']);

        //ajax routes

        Route::get('/getCode/{codigo}', ['uses' => 'Faculty\FacultyController@getCode']);
        Route::get('/getName/{nombre}', ['uses' => 'Faculty\FacultyController@getName']);
    });

    //Our Faculty Routes
    Route::group(['prefix' => 'ourFaculty'], function() {
        Route::get('/{id}', ['as' => 'index.ourFaculty', 'uses' => 'OurFaculty\OurFacultyController@index']);
    });

    //User routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', ['as' => 'index.users', 'uses' => 'User\UserController@index']);
        Route::get('/new', ['as' => 'new.users', 'uses' => 'User\UserController@create']);
        Route::get('/edit', ['as' => 'edit.users', 'uses' => 'User\UserController@edit']);
        Route::post('/save', ['as' => 'save.users', 'uses' => 'User\UserController@save']);
        Route::get('/delete', ['as' => 'delete.users', 'uses' => 'User\UserController@delete']);
        Route::post('/update', ['as' => 'update.users', 'uses' => 'User\UserController@update']);
        Route::get('/view', ['as' => 'view.users', 'uses' => 'User\UserController@view']);
        Route::get('/getUsername/{code}', ['uses' => 'User\UserController@getUsername']);
        Route::get('/forgetPassword', ['as' => 'forgetPassword.users', 'uses' => 'User\UserController@forgetPassword']);
    });

    //Courses routes
    Route::group(['prefix' => 'courses'], function() {
        Route::get('/', ['as' => 'index.courses', 'uses' => 'Course\CourseController@index']);
        Route::get('/new', ['as' => 'new.courses', 'uses' => 'Course\CourseController@create']);
        Route::get('/edit', ['as' => 'edit.courses', 'uses' => 'Course\CourseController@edit']);
        Route::get('/evidence', ['as' => 'evidence.courses', 'uses' => 'Course\CourseController@evidence']);
        Route::post('/save', ['as' => 'save.courses', 'uses' => 'Course\CourseController@save']);
        Route::get('/delete', ['as' => 'delete.courses', 'uses' => 'Course\CourseController@delete']);
        Route::post('/update', ['as' => 'update.courses', 'uses' => 'Course\CourseController@update']);
        Route::get('/view', ['as' => 'view.courses', 'uses' => 'Course\CourseController@view']);
        Route::get('/pick', ['as' => 'pick.courses', 'uses' => 'Course\CourseController@pick']);
        Route::get('/getCode/{code}', ['uses' => 'Course\CourseController@getCode']);
    });

    Route::group(['prefix' => 'evaluatedCourses'], function() {
        Route::get('/', ['as' => 'index.evaluatedCourses', 'uses' => 'EvaluatedCourse\EvaluatedCourseController@index']);
        Route::get('/edit', ['as' => 'edit.evaluatedCourses', 'uses' => 'EvaluatedCourse\EvaluatedCourseController@edit']);
    });

    //Educational Objectives Routes
    Route::group(['prefix' => 'educationalObjectives'], function() {
        Route::get('/', ['as' => 'index.educationalObjectives', 'uses' => 'EducationalObjectives\EducationalObjectivesController@index']);
        Route::get('/view', ['as' => 'view.educationalObjectives', 'uses' => 'EducationalObjectives\EducationalObjectivesController@view']);
        Route::get('/new', ['as' => 'new.educationalObjectives', 'uses' => 'EducationalObjectives\EducationalObjectivesController@create']);
        Route::get('/edit', ['as' => 'edit.educationalObjectives', 'uses' => 'EducationalObjectives\EducationalObjectivesController@edit']);
        Route::post('/save', ['as' => 'save.educationalObjectives', 'uses' => 'EducationalObjectives\EducationalObjectivesController@save']);
        Route::post('/update', ['as' => 'update.educationalObjectives', 'uses' => 'EducationalObjectives\EducationalObjectivesController@update']);

        Route::get('/getEducationalObjectiveStudentResults/{educationalObjective_code}', ['uses' => 'EducationalObjectives\EducationalObjectivesController@getEducationalObjectiveStudentResults']);
        Route::get('/getById/{educationalObjective_code}', ['uses' => 'EducationalObjectives\EducationalObjectivesController@getById']);
        Route::get('/delete', ['uses' => 'EducationalObjectives\EducationalObjectivesController@delete']);
        Route::get('/indexByFaculty/{idFaculty}', ['uses' => 'EducationalObjectives\EducationalObjectivesController@indexByFaculty']);
        Route::get('/findFaculty/{idFaculty}', ['uses' => 'EducationalObjectives\EducationalObjectivesController@findFaculty']);

         //AYAX routes
        Route::get('/getNumber/{number}', ['uses' => 'EducationalObjectives\EducationalObjectivesController@getNumber']);
    });

    //Suggestion Routes
    Route::group(['prefix' => 'suggestions'], function() {
        Route::get('/', ['as' => 'index.suggestions', 'uses' => 'Suggestion\SuggestionController@index']);
        Route::get('/indexAll', ['as' => 'indexAll.suggestions', 'uses' => 'Suggestion\SuggestionController@indexAll']);
        Route::get('/aprrove', ['as' => 'aprrove.suggestions', 'uses' => 'Suggestion\SuggestionController@aprrove']);
        Route::get('/reject', ['as' => 'reject.suggestions', 'uses' => 'Suggestion\SuggestionController@reject']);
        Route::get('/new', ['as' => 'new.suggestions', 'uses' => 'Suggestion\SuggestionController@create']);
        Route::post('/save', ['as' => 'save.suggestions', 'uses' => 'Suggestion\SuggestionController@save']);
        Route::get('/edit', ['as' => 'edit.suggestions', 'uses' => 'Suggestion\SuggestionController@edit']);
        Route::post('/update', ['as' => 'update.suggestions', 'uses' => 'Suggestion\SuggestionController@update']);
        Route::get('/delete', ['as' => 'delete.suggestions', 'uses' => 'Suggestion\SuggestionController@delete']);
        Route::post('/search', ['as' => 'search.suggestions', 'uses' => 'Suggestion\SuggestionController@searchSuggestions']);

        //AJAX routes
        Route::get('/getSuggestion/{suggestionId}', ['uses' => 'Suggestion\SuggestionController@getSuggestion']);
        Route::post('/searchSuggestions', ['uses' => 'Suggestion\SuggestionController@searchSuggestions']);
    });

    //Teacher Management Routes
    Route::group(['prefix' => 'teachers'], function() {
        Route::get('/', ['as' => 'index.teachers', 'uses' => 'Teacher\TeacherController@index']);
        Route::get('/new', ['as' => 'new.teacher', 'uses' => 'Teacher\TeacherController@create']);
        Route::post('/save', ['as' => 'saveTeacher.teachers', 'uses' => 'Teacher\TeacherController@save']);
        Route::get('/edit', ['as' => 'edit.teacher', 'uses' => 'Teacher\TeacherController@edit']);
        Route::get('/delete', ['as' => 'delete.teacher', 'uses' => 'Teacher\TeacherController@delete']);
        Route::post('/update', ['as' => 'updateTeacher.teachers', 'uses' => 'Teacher\TeacherController@update']);
        Route::get('/view', ['as' => 'view.teacher', 'uses' => 'Teacher\TeacherController@view']);
        Route::post('/', ['as' => 'search.teachers', 'uses' => 'Teacher\TeacherController@search']);

        //AJAX routes
        Route::post('/search', ['uses' => 'Teacher\TeacherController@searchModal']);

        Route::post('/searchEvaluador', ['as' => 'search.evaluator','uses' => 'Teacher\TeacherController@searchModalEv']);//NO TOCAR!

        Route::get('/getTeacher/{teacherId}', ['uses' => 'Teacher\TeacherController@getTeacher']);
        Route::get('/delete/{teacherid}', ['uses' => 'Teacher\TeacherController@delete']);
        Route::get('/getCodigo/{codigo}', ['uses' => 'Teacher\TeacherController@getCodigo']);
        Route::get('/getEmail/{email}', ['uses' => 'Teacher\TeacherController@getEmail']);
    });


    //MyCourses routes
    Route::group(['prefix' => 'myCourses'], function() {
        Route::get('/', ['as' => 'index.myCourses', 'uses' => 'MyCourses\MyCoursesController@index']);
        Route::get('/tableView', ['as' => 'tableView.myCourses', 'uses' => 'MyCourses\MyCoursesController@tableView']);
        Route::get('/tableEdit', ['as' => 'tableEdit.myCourses', 'uses' => 'MyCourses\MyCoursesController@tableEdit']);
        Route::get('/finish', ['as' => 'finish.myCourses', 'uses' => 'MyCourses\MyCoursesController@finish']);
        Route::get('/reportView', ['as' => 'reportView.myCourses', 'uses' => 'MyCourses\MyCoursesController@reportView']);
        Route::get('/reportEdit', ['as' => 'reportEdit.myCourses', 'uses' => 'MyCourses\MyCoursesController@reportEdit']);
        Route::post('/reportSave', ['as' => 'reportSave.myCourses', 'uses' => 'MyCourses\MyCoursesController@reportSave']);
        Route::post('/saveTable', ['as' => 'saveTable.myCourses', 'uses' => 'MyCourses\MyCoursesController@saveTable']);

        //Student Management Routes
        Route::group(['prefix' => 'students'], function() {
            Route::get('/load', ['as' => 'load.students', 'uses' => 'Student\StudentController@load']);

            Route::get('/importExport', 'Student\StudentController@importExport');
            Route::get('/downloadExcel/{type}', 'Student\StudentController@downloadExcel');
            //Route::get('/download/{filename}', ['as' => 'getDownload.students' , 'uses' => 'Student\StudentController@getDownload']);
            Route::post('/importExcel', [ 'as' => 'upload.students', 'uses' => 'Student\StudentController@importExcel']);
            Route::get('/delete', 'Student\StudentController@delete');
        });

        //Evidence Management Routes
        Route::group(['prefix' => 'evidences'], function() {
            Route::get('/upload', ['as' => 'upload.evidences', 'uses' => 'Evidence\EvidenceController@upload']);
            Route::get('/get/{filename}', ['as' => 'getentry.evidences', 'uses' => 'Evidence\EvidenceController@get']);
            Route::post('/add',[ 'as' => 'addentry.evidences', 'uses' => 'Evidence\EvidenceController@add']);
            Route::post('/addM',[ 'as' => 'addentryM.evidences', 'uses' => 'Evidence\EvidenceController@addM']);
            Route::get('/uploadMeasuring', ['as' => 'uploadMeasuring.evidences', 'uses' => 'Evidence\EvidenceController@uploadMeasuring']);
            Route::get('/download/{filename}', ['as' => 'getDownload.evidences' , 'uses' => 'Evidence\EvidenceController@getDownload']);
            Route::get('/delete', ['as' => 'delete.evidences' , 'uses' => 'Evidence\EvidenceController@delete']);
            Route::get('/deleteM', ['as' => 'deleteM.evidences' , 'uses' => 'Evidence\EvidenceController@deleteM']);
        });
    });

    //Timetable Management Route
    Route::group(['prefix' => 'timetables'], function() {
        Route::get('/', ['as' => 'index.timetable', 'uses' => 'Timetable\TimetableController@index']);

        Route::get('/create', ['as' => 'create.timetable', 'uses' => 'Timetable\TimetableController@create']);
        Route::post('/save', ['as' => 'save.timetable', 'uses' => 'Timetable\TimetableController@save']);

        Route::get('/edit', ['as' => 'edit.timetable', 'uses' => 'Timetable\TimetableController@edit']);
    });

    //Students Results
    Route::group(['prefix' => 'studentsResult'], function() {
        Route::get('/', ['as' => 'index.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@index']);
        Route::get('/create', ['as' => 'create.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@create']);
        Route::post('/save', ['as' => 'save.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@save']);
        Route::get('/view/{id}', ['as' => 'view.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@view']);
        Route::get('/edit/{id}', ['as' => 'edit.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@edit']);
        Route::post('/update', ['as' => 'update.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@update']);
        Route::get('/delete', ['as' => 'delete.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@delete']);

        Route::get('/indexEvaluated', ['as' => 'indexEvaluated.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@indexEvaluated']);
        Route::get('/editEvaluated', ['as' => 'editEvaluated.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@editEvaluated']);
        Route::post('/updateEvaluated', ['as' => 'updateEvaluated.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@updateEvaluated']);

        Route::get('/contributions', ['as' => 'contributions.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@contributions']);
        Route::post('/updateContributions', ['as' => 'updateContributions.studentsResult', 'uses' => 'StudentsResult\StudentsResultController@updateContributions']);

        //AYAX routes
        Route::get('/getById/{studentResultCode}', ['uses' => 'StudentsResult\StudentsResultController@getById']);
        Route::get('/getIdentifier/{identifier}', ['uses' => 'StudentsResult\StudentsResultController@getIdentifier']);
    });

    //Aspect Routes
    Route::group(['prefix' => 'aspects'], function() {
        Route::get('/', ['as' => 'index.aspects', 'uses' => 'Aspect\AspectController@index']);
        Route::get('/create', ['as' => 'create.aspects', 'uses' => 'Aspect\AspectController@create']);
        Route::post('/save', ['as' => 'save.aspects', 'uses' => 'Aspect\AspectController@save']);
        Route::get('/edit', ['as' => 'edit.aspects', 'uses' => 'Aspect\AspectController@edit']);
        Route::post('/update', ['as' => 'update.aspects', 'uses' => 'Aspect\AspectController@update']);
        Route::get('/view', ['as' => 'view.aspects', 'uses' => 'Aspect\AspectController@view']);
        Route::get('/delete', ['as' => 'delete.aspects', 'uses' => 'Aspect\AspectController@delete']);

        //AJAX Routes

        Route::get('/findRE/{idStudentsResult}', ['uses' => 'Aspect\AspectController@findRE']);
        Route::get('/findAspect', ['uses' => 'Aspect\AspectController@findAspect']);
        Route::get('/findAspectByRE/{idStudentsResult}', ['uses' => 'Aspect\AspectController@findAspectByRE']);

        Route::get('/getAspectCriteria/{aspectCode}', ['uses' => 'Aspect\AspectController@getAspectCriteria']);
        Route::get('/getAll', ['uses' => 'Aspect\AspectController@getAll']);
        Route::get('/getById/{aspectCode}', ['uses' => 'Aspect\AspectController@getById']);
        Route::get('/indexByRubric/{idRubric}', ['uses' => 'Aspect\AspectController@indexByRubric']);
    });

    //Criteria Routes
    Route::group(['prefix' => 'criteria'], function() {
        Route::get('/edit', ['as' => 'edit.criteria', 'uses' => 'Criteria\CriteriaController@edit']);
        Route::post('/save', ['as' => 'save.criteria', 'uses' => 'Criteria\CriteriaController@save']);
        Route::post('/update', ['as' => 'update.criteria', 'uses' => 'Criteria\CriteriaController@update']);
        Route::post('/updateCriterionLevel', ['as' => 'updateCriterionLevel.criteria', 'uses' => 'Criteria\CriteriaController@updateCriterionLevel']);
        Route::get('/view', ['as' => 'view.criteria', 'uses' => 'Criteria\CriteriaController@view']);
        Route::get('/delete', ['as' => 'delete.criteria', 'uses' => 'Criteria\CriteriaController@delete']);

        //AJAX routes

        Route::get('/findCriterionByAspect/{idAspect}', ['uses' => 'Criteria\CriteriaController@findCriterionByAspect']);
    });

    //Criteria Level Routes
    Route::group(['prefix' => 'criterialevel'], function() {
        Route::get('/', ['as' => 'index.criterialevel', 'uses' => 'CriteriaLevel\CriteriaLevelController@index']);
        Route::get('/new', ['as' => 'new.criterialevel', 'uses' => 'CriteriaLevel\CriteriaLevelController@create']);
        Route::get('/edit', ['as' => 'edit.criterialevel', 'uses' => 'CriteriaLevel\CriteriaLevelController@edit']);
        Route::post('/update', ['as' => 'update.criterialevel', 'uses' => 'CriteriaLevel\CriteriaLevelController@update']);
    });


    //Consolidated
    Route::group(['prefix' => 'consolidated'], function() {

        //Evaluation
        Route::group(['prefix' => 'evaluation'], function() {
            Route::get('/', ['as' => 'index.evaluation', 'uses' => 'Consolidated\EvaluationController@index']);
            Route::get('/view', ['as' => 'view.evaluation', 'uses' => 'Consolidated\EvaluationController@view']);
            Route::get('/download', ['as' => 'downloadAsPdf.evaluation', 'uses' => 'Consolidated\EvaluationController@downloadAsPdf']);
        });

        Route::get('/view-status', ['as' => 'view-status.evaluation', 'uses' => 'Consolidated\EvaluationController@view_matrix_advance']);
        Route::get('/status', ['as' => 'status.evaluation', 'uses' => 'Consolidated\EvaluationController@search_matrix_advance']);

        //AYAX Evaluation

        //Route::get('/view/{cycle}', ['uses' => 'Consolidated\EvaluationController@view']);

        //
        Route::get('/measuring/', ['as' => 'index.measuring', 'uses' => 'Consolidated\MeasuringController@index']);
        Route::post('/period/', ['as' => 'period.measuring', 'uses' => 'Consolidated\MeasuringController@period']);
        Route::post('/measuring/download', ['as'=>'downloadAsPdf.measuring', 'uses'=>'Consolidated\MeasuringController@downloadAsPdf']);

        Route::get('/results/', ['as' => 'index.results', 'uses' => 'Consolidated\ResultsController@index']);
        Route::get('/results/download', ['as' => 'downloadAsPdf.results', 'uses' => 'Consolidated\ResultsController@downloadAsPdf']);

        Route::get('/pending/', ['as' => 'pending.index', 'uses' => 'Consolidated\PendingController@index']);

        Route::get('/evidences', ['as' => 'evidences.index', 'uses' => 'Consolidated\EvidenceController@index']);
        /*
        Route::group(['middleware' => 'action_permission'], function() {
            Route::get('/evidences', ['as' => 'evidences.index', 'uses' => 'Consolidated\EvidenceController@index']);
        });
        */
    });

    //Profile Routes
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', ['as' => 'index.profile', 'uses' => 'Profile\ProfileController@index']);
        Route::get('/new', ['as' => 'new.profile', 'uses' => 'Profile\ProfileController@create']);
        Route::post('/save', ['as' => 'save.profile', 'uses' => 'Profile\ProfileController@save']);
        Route::get('/edit', ['as' => 'edit.profile', 'uses' => 'Profile\ProfileController@edit']);
        Route::get('/view', ['as' => 'view.profile', 'uses' => 'Profile\ProfileController@view']);
        Route::post('/update', ['as' => 'update.profile', 'uses' => 'Profile\ProfileController@update']);
        Route::get('/delete', ['as' => 'delete.profile', 'uses' => 'Profile\ProfileController@delete']);
    });

    //Academic Cycle
    Route::group(['prefix' => 'academicCycle'], function() {
        Route::get('/', ['as' => 'index.academicCycle', 'uses' => 'AcademicCycle\AcademicCycleController@index']);
        Route::get('/new', ['as' => 'form.academicCycle', 'uses' => 'AcademicCycle\AcademicCycleController@create']);
        Route::post('/save', ['as' => 'save.academicCycle', 'uses' => 'AcademicCycle\AcademicCycleController@save']);
        Route::get('/delete', ['as' => 'delete.academicCycle', 'uses' => 'AcademicCycle\AcademicCycleController@delete']);
 
        //AYAX routes

        Route::get('/getCycle/{cycle}', ['uses' => 'AcademicCycle\AcademicCycleController@getCycle']);
    });

    Route::group(['prefix' => 'myUser'], function() {
        Route::get('/edit', ['as' => 'edit.myUser', 'uses' => 'MyUser\MyUserController@edit']);
        Route::post('/update', ['as' => 'update.myUser', 'uses' => 'MyUser\MyUserController@update']);
    });
    
    Route::group(['prefix' => 'psp'], function() {

        Route::group(['prefix' => 'supervisor'], function() {

            Route::get('/', ['as' => 'supervisor.index', 'uses' => 'Psp\Supervisor\SupervisorController@index']);
            Route::get('/show/{id}', ['as' => 'supervisor.show', 'uses' => 'Psp\Supervisor\SupervisorController@show']);
            Route::get('/create', ['as' => 'supervisor.create', 'uses' => 'Psp\Supervisor\SupervisorController@create']);
            Route::post('/create', ['as' => 'supervisor.store', 'uses' => 'Psp\Supervisor\SupervisorController@store']);
            Route::get('/edit/{id}', ['as' => 'supervisor.edit', 'uses' => 'Psp\Supervisor\SupervisorController@edit']);
            Route::post('/edit/{id}', ['as' => 'supervisor.update', 'uses' => 'Psp\Supervisor\SupervisorController@update']);
            Route::get('/delete/{id}', ['as' => 'supervisor.delete', 'uses' => 'Psp\Supervisor\SupervisorController@destroy']);
        });

        //PspGroups Luis Llanos

        Route::group(['prefix' => 'pspGroup'], function() {
            Route::get('/', ['as' => 'pspGroup.index', 'uses' => 'Psp\PspGroup\PspGroupController@index']);
            Route::get('create', ['as' => 'pspGroup.create', 'uses' => 'Psp\PspGroup\PspGroupController@create']);
            Route::post('create', ['as' => 'pspGroup.store', 'uses' => 'Psp\PspGroup\PspGroupController@store']);
            Route::get('show/{id}', ['as' => 'pspGroup.show', 'uses' => 'Psp\PspGroup\PspGroupController@show']);
            Route::get('edit/{id}', ['as' => 'pspGroup.edit', 'uses' => 'Psp\PspGroup\PspGroupController@edit']);
            Route::post('edit/{id}', ['as' => 'pspGroup.update', 'uses' => 'Psp\PspGroup\PspGroupController@update']);
            Route::get('delete/{id}', ['as' => 'pspGroup.delete', 'uses' => 'Psp\PspGroup\PspGroupController@destroy']);
            //Esta ruta es para probar los API, no borrar
            //Route::get('supervisor',['uses' => 'API\Psp\Supervisor\SupervisorController@getAll']);
        });

        Route::group(['middleware' => 'teacherPsp'], function(){ //restringe el acceso solo a profesores de psp

            Route::group(['prefix' => 'supervisor'], function() {

                Route::get('/', ['as' => 'supervisor.index', 'uses' => 'Psp\Supervisor\SupervisorController@index']);                
                Route::get('/create', ['as' => 'supervisor.create', 'uses' => 'Psp\Supervisor\SupervisorController@create']);
                Route::post('/create', ['as' => 'supervisor.store', 'uses' => 'Psp\Supervisor\SupervisorController@store']);
                Route::get('/show/{id}', ['as' => 'supervisor.show', 'uses' => 'Psp\Supervisor\SupervisorController@show']);
                Route::get('/edit/{id}', ['as' => 'supervisor.edit', 'uses' => 'Psp\Supervisor\SupervisorController@edit']);
                Route::post('/edit/{id}', ['as' => 'supervisor.update', 'uses' => 'Psp\Supervisor\SupervisorController@update']);
                Route::get('/delete/{id}', ['as' => 'supervisor.delete', 'uses' => 'Psp\Supervisor\SupervisorController@destroy']);

                //Seleccion de integrantes de para un proceso de psp
                Route::group(['prefix' => 'participant'], function(){
                    Route::get('/{id}', ['as' => 'supervisor.index-participant', 'uses' => 'Psp\Supervisor\ParticipationController@index']);
                    Route::post('createSupervisor', ['as' => 'supervisor.participant.store.supervisor', 'uses' => 'Psp\Supervisor\ParticipationController@storeSupervisor']);
                    Route::get('deleteSupervisor/{id}', ['as' => 'supervisor.participant.delete.supervisor', 'uses' => 'Psp\Supervisor\ParticipationController@destroySupervisor']);

                    Route::post('createTeacher', ['as' => 'supervisor.participant.store.docente', 'uses' => 'Psp\Supervisor\ParticipationController@storeTeacher']);
                    Route::get('deleteTeacher/{id}', ['as' => 'supervisor.participant.delete.docente', 'uses' => 'Psp\Supervisor\ParticipationController@destroyTeacher']);
                });
            });

        });
            //Template
            Route::group(['prefix' => 'template'], function() {
                Route::get('/', ['as' => 'template.index', 'uses' => 'Psp\Template\TemplateController@index']);
                Route::get('create', ['as' => 'template.create', 'uses' => 'Psp\Template\TemplateController@create']);
                Route::post('create', ['as' => 'template.store', 'uses' => 'Psp\Template\TemplateController@store']);
                Route::get('show/{id}', ['as' => 'template.show', 'uses' => 'Psp\Template\TemplateController@show']);
                Route::get('edit/{id}', ['as' => 'template.edit', 'uses' => 'Psp\Template\TemplateController@edit']);
                Route::post('edit/{id}', ['as' => 'template.update', 'uses' => 'Psp\Template\TemplateController@update']);
                Route::get('delete/{id}', ['as' => 'template.delete', 'uses' => 'Psp\Template\TemplateController@destroy']);    
            });                    

            //PspGroups Luis Llanos

            Route::group(['prefix' => 'pspGroup'], function() {
                Route::get('/', ['as' => 'pspGroup.index', 'uses' => 'Psp\PspGroup\PspGroupController@index']);
                Route::get('create', ['as' => 'pspGroup.create', 'uses' => 'Psp\PspGroup\PspGroupController@create']);
                Route::post('create', ['as' => 'pspGroup.store', 'uses' => 'Psp\PspGroup\PspGroupController@store']);
                Route::get('show/{id}', ['as' => 'pspGroup.show', 'uses' => 'Psp\PspGroup\PspGroupController@show']);
                Route::get('edit/{id}', ['as' => 'pspGroup.edit', 'uses' => 'Psp\PspGroup\PspGroupController@edit']);
                Route::post('edit/{id}', ['as' => 'pspGroup.update', 'uses' => 'Psp\PspGroup\PspGroupController@update']);
                Route::get('delete/{id}', ['as' => 'pspGroup.delete', 'uses' => 'Psp\PspGroup\PspGroupController@destroy']);
                Route::get('selectGroup',['as' => 'pspGroup.selectGroupCreate', 'uses' => 'Psp\PspGroup\PspGroupController@selectGroupCreate']); //esto es para el alumno, el resto para el admin
                Route::post('selectGroup',['as' => 'pspGroup.selectGroupStore', 'uses' => 'Psp\PspGroup\PspGroupController@selectGroupStore']);
            });

            //PspProcess
            Route::group(['prefix' => 'pspProcess'], function() {
                Route::get('/', ['as' => 'pspProcess.index', 'uses' => 'Psp\PspProcess\PspProcessController@index']);
                Route::get('create', ['as' => 'pspProcess.create', 'uses' => 'Psp\PspProcess\PspProcessController@create']);
                Route::post('create', ['as' => 'pspProcess.store', 'uses' => 'Psp\PspProcess\PspProcessController@store']);
                Route::get('show/{id}', ['as' => 'pspProcess.show', 'uses' => 'Psp\PspProcess\PspProcessController@show']);
                Route::get('edit/{id}', ['as' => 'pspProcess.edit', 'uses' => 'Psp\PspProcess\PspProcessController@edit']);
                Route::post('edit/{id}', ['as' => 'pspProcess.update', 'uses' => 'Psp\PspProcess\PspProcessController@update']);
                Route::get('delete/{id}', ['as' => 'pspProcess.delete', 'uses' => 'Psp\PspProcess\PspProcessController@destroy']);    
                Route::post('activarProfesor', ['as' => 'pspProcess.activateTeacher', 'uses' => 'Psp\PspProcess\PspProcessController@activateTeacher']);
                Route::post('activarAlumnos', ['as' => 'pspProcess.activateStudents', 'uses' => 'Psp\PspProcess\PspProcessController@activateStudents']);
                Route::get('conf', ['as' => 'pspProcess.conf', 'uses' => 'Psp\PspProcess\PspProcessController@indexconf']);
                Route::get('confedit/{id}', ['as' => 'pspProcess.editconf', 'uses' => 'Psp\PspProcess\PspProcessController@editconf']);
                Route::post('confedit/{id}', ['as' => 'pspProcess.updateconf', 'uses' => 'Psp\PspProcess\PspProcessController@updateconf']);
            });

            //FreeHour            
            Route::group(['prefix' => 'freeHour'], function() {
                Route::get('/', ['as' => 'freeHour.index', 'uses' => 'Psp\FreeHour\FreeHourController@index']);
                Route::get('create', ['as' => 'freeHour.create', 'uses' => 'Psp\FreeHour\FreeHourController@create']);
                Route::post('create', ['as' => 'freeHour.store', 'uses' => 'Psp\FreeHour\FreeHourController@store']);
                Route::get('show/{id}', ['as' => 'freeHour.show', 'uses' => 'Psp\FreeHour\FreeHourController@show']);
                Route::get('edit/{id}', ['as' => 'freeHour.edit', 'uses' => 'Psp\FreeHour\FreeHourController@edit']);
                Route::post('edit/{id}', ['as' => 'freeHour.update', 'uses' => 'Psp\FreeHour\FreeHourController@update']);
                Route::get('delete/{id}', ['as' => 'freeHour.delete', 'uses' => 'Psp\FreeHour\FreeHourController@destroy']);    
            });

            //Meeting
            Route::group(['prefix' => 'meeting'], function() {
                Route::get('/', ['as' => 'meeting.index', 'uses' => 'Psp\meeting\MeetingController@index']);
                Route::get('create', ['as' => 'meeting.create', 'uses' => 'Psp\meeting\MeetingController@create']);
                Route::post('create', ['as' => 'meeting.store', 'uses' => 'Psp\meeting\MeetingController@store']);
                Route::get('show/{id}', ['as' => 'meeting.show', 'uses' => 'Psp\meeting\MeetingController@show']);
                Route::get('edit/{id}', ['as' => 'meeting.edit', 'uses' => 'Psp\meeting\MeetingController@edit']);
                Route::post('edit/{id}', ['as' => 'meeting.update', 'uses' => 'Psp\meeting\MeetingController@update']);
                Route::get('delete/{id}', ['as' => 'meeting.delete', 'uses' => 'Psp\meeting\MeetingController@destroy']);    
                Route::get('search/{id}', ['as' => 'meeting.search', 'uses' => 'Psp\meeting\MeetingController@search']);    
                Route::get('indexSup', ['as' => 'meeting.indexSup', 'uses' => 'Psp\meeting\MeetingController@indexSup']);
                Route::get('createSup', ['as' => 'meeting.createSup', 'uses' => 'Psp\meeting\MeetingController@createSup']);
                Route::post('createSup', ['as' => 'meeting.storeSup', 'uses' => 'Psp\meeting\MeetingController@storeSup']);
            });

            //MeetingTeacher
            Route::group(['prefix' => 'MeetingTeacher'], function() {
                Route::get('/', ['as' => 'MeetingTeacher.index', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@index']);
                Route::get('create/{id}', ['as' => 'MeetingTeacher.create', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@create']);
                Route::post('create/{id}', ['as' => 'MeetingTeacher.store', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@store']);
                Route::get('show/{id}', ['as' => 'MeetingTeacher.show', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@show']);
                Route::get('edit/{id}', ['as' => 'MeetingTeacher.edit', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@edit']);
                Route::post('edit/{id}', ['as' => 'MeetingTeacher.update', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@update']);
                Route::get('delete/{id}', ['as' => 'MeetingTeacher.delete', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@destroy']);    
                Route::get('search/{id}', ['as' => 'MeetingTeacher.search', 'uses' => 'Psp\MeetingTeacher\MeetingTeacherController@search']);    
            });

            //Inscription File
            Route::group(['prefix' => 'inscription'], function() {
                Route::get('/', ['as' => 'inscription.index', 'uses' => 'Psp\Inscription\InscriptionController@index']);
                Route::get('create', ['as' => 'inscription.create', 'uses' => 'Psp\Inscription\InscriptionController@create']);
                Route::post('create', ['as' => 'inscription.store', 'uses' => 'Psp\Inscription\InscriptionController@store']);
                Route::get('show/{id}', ['as' => 'inscription.show', 'uses' => 'Psp\Inscription\InscriptionController@show']);
                Route::get('edit/{id}', ['as' => 'inscription.edit', 'uses' => 'Psp\Inscription\InscriptionController@edit']);
                Route::post('edit/{id}', ['as' => 'inscription.update', 'uses' => 'Psp\Inscription\InscriptionController@update']);
                Route::get('delete/{id}', ['as' => 'inscription.delete', 'uses' => 'Psp\Inscription\InscriptionController@destroy']);    
            });

            //Phase
            Route::group(['prefix' => 'phase'], function() {
                Route::get('/', ['as' => 'phase.index', 'uses' => 'Psp\Phase\PhaseController@index']);
                Route::get('create', ['as' => 'phase.create', 'uses' => 'Psp\Phase\PhaseController@create']);
                Route::post('create', ['as' => 'phase.store', 'uses' => 'Psp\Phase\PhaseController@store']);
                Route::get('show/{id}', ['as' => 'phase.show', 'uses' => 'Psp\Phase\PhaseController@show']);
                Route::get('edit/{id}', ['as' => 'phase.edit', 'uses' => 'Psp\Phase\PhaseController@edit']);
                Route::post('edit/{id}', ['as' => 'phase.update', 'uses' => 'Psp\Phase\PhaseController@update']);
                Route::get('delete/{id}', ['as' => 'phase.delete', 'uses' => 'Psp\Phase\PhaseController@destroy']);    
            });

            

            //Aspecto
            Route::group(['prefix' => 'aspecto'], function() {
                Route::get('create/{id}', ['as' => 'aspecto.create', 'uses' => 'Psp\Aspecto\AspectoController@create']);
                Route::get('edit/{id}', ['as' => 'aspecto.edit', 'uses' => 'Psp\Aspecto\AspectoController@edit']);  
                Route::post('edit/{id}', ['as' => 'aspecto.update', 'uses' => 'Psp\Aspecto\AspectoController@update']);
                Route::post('create/{id}', ['as' => 'aspecto.store', 'uses' => 'Psp\Aspecto\AspectoController@store']);
            });
            

            //Schedule Meeting
            Route::group(['prefix' => 'scheduleMeeting'], function() {
                Route::get('/', ['as' => 'scheduleMeeting.index', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@index']);
                Route::get('create', ['as' => 'scheduleMeeting.create', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@create']);
                Route::post('create', ['as' => 'scheduleMeeting.store', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@store']);
                Route::get('show/{id}', ['as' => 'scheduleMeeting.show', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@show']);
                Route::get('edit/{id}', ['as' => 'scheduleMeeting.edit', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@edit']);
                Route::post('edit/{id}', ['as' => 'scheduleMeeting.update', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@update']);
                Route::get('delete/{id}', ['as' => 'scheduleMeeting.delete', 'uses' => 'Psp\ScheduleMeeting\scheduleMeetingController@destroy']);    
            });

            //Status
            Route::group(['prefix' => 'status'], function() {
                Route::get('/', ['as' => 'status.index', 'uses' => 'Psp\Status\StatusController@index']);
                Route::get('create', ['as' => 'status.create', 'uses' => 'Psp\Status\StatusController@create']);
                Route::post('create', ['as' => 'status.store', 'uses' => 'Psp\Status\StatusController@store']);
                Route::get('show/{id}', ['as' => 'status.show', 'uses' => 'Psp\Status\StatusController@show']);
                Route::get('edit/{id}', ['as' => 'status.edit', 'uses' => 'Psp\Status\StatusController@edit']);
                Route::post('edit/{id}', ['as' => 'status.update', 'uses' => 'Psp\Status\StatusController@update']);
                Route::get('delete/{id}', ['as' => 'status.delete', 'uses' => 'Psp\Status\StatusController@destroy']);    
            });

            //PSP Student
            Route::group(['prefix' => 'student'], function() {
                //prefijo
                //ruta vista controlador
                Route::get('/', ['as' => 'student.index', 'uses' => 'Psp\Student\StudentController@index']);
                Route::get('create', ['as' => 'student.create', 'uses' => 'Psp\Student\StudentController@create']);
                Route::post('create', ['as' => 'student.store', 'uses' => 'Psp\Student\StudentController@store']);
                Route::get('show/{id}', ['as' => 'student.show', 'uses' => 'Psp\Student\StudentController@show']);
                Route::get('edit/{id}', ['as' => 'student.edit', 'uses' => 'Psp\Student\StudentController@edit']);
                Route::post('edit/{id}', ['as' => 'student.update', 'uses' => 'Psp\Student\StudentController@update']);
                Route::get('delete/{id}', ['as' => 'student.delete', 'uses' => 'Psp\Student\StudentController@destroy']);    
            });

            //PSP Student Final score
            Route::group(['prefix' => 'studentScore'], function() {
                Route::get('/', ['as' => 'studentScore.index', 'uses' => 'Psp\StudentScore\StudentScoreController@index']);  
            });


            //PSP Document
            Route::group(['prefix' => 'pspDocument'], function() {
                Route::get('/', ['as' => 'pspDocument.index', 'uses' => 'Psp\PspDocument\PspDocumentController@index']);
                Route::get('create/{id}', ['as' => 'pspDocument.create', 'uses' => 'Psp\PspDocument\PspDocumentController@create']);
                Route::post('create/{id}', ['as' => 'pspDocument.store', 'uses' => 'Psp\PspDocument\PspDocumentController@store']);
                Route::get('show/{id}', ['as' => 'pspDocument.show', 'uses' => 'Psp\PspDocument\PspDocumentController@show']);
                Route::get('edit/{id}', ['as' => 'pspDocument.edit', 'uses' => 'Psp\PspDocument\PspDocumentController@edit']);
                Route::post('edit/{id}', ['as' => 'pspDocument.update', 'uses' => 'Psp\PspDocument\PspDocumentController@update']);
                Route::get('check/{id}', ['as' => 'pspDocument.check', 'uses' => 'Psp\PspDocument\PspDocumentController@check']);
                Route::post('check/{id}', ['as' => 'pspDocument.updateC', 'uses' => 'Psp\PspDocument\PspDocumentController@updateC']);
                Route::get('delete/{id}', ['as' => 'pspDocument.delete', 'uses' => 'Psp\PspDocument\PspDocumentController@destroy']);
                Route::get('mail/{id}', ['as' => 'pspDocument.mail', 'uses' => 'Psp\PspDocument\PspDocumentController@mail']);
                Route::get('search/{id}', ['as' => 'pspDocument.search', 'uses' => 'Psp\PspDocument\PspDocumentController@search']);    
            });

            Route::group(['prefix' => 'skill'], function() {
                Route::get('/', ['as' => 'skill.index', 'uses' => 'Psp\Skill\SkillController@index']);
                Route::get('create', ['as' => 'skill.create', 'uses' => 'Psp\Skill\SkillController@create']);
                Route::post('create', ['as' => 'skill.store', 'uses' => 'Psp\Skill\SkillController@store']);
                Route::get('show/{id}', ['as' => 'skill.show', 'uses' => 'Psp\Skill\SkillController@show']);
                Route::get('edit/{id}', ['as' => 'skill.edit', 'uses' => 'Psp\Skill\SkillController@edit']);
                Route::post('edit/{id}', ['as' => 'skill.update', 'uses' => 'Psp\Skill\SkillController@update']);
                Route::get('delete/{id}', ['as' => 'skill.delete', 'uses' => 'Psp\Skill\SkillController@destroy']);    
            });

          

});   


});

//FILES DOWNLOAD
Route::get('/myCourses/evidences/download/{filename}', ['as' => 'getDownload.evidences' , 'uses' => 'Evidence\EvidenceController@getDownload']);
Route::get('/enhacementPlan/get/{filename}', ['as' => 'getentry', 'uses' => 'EnhacementPlan\EnhacementController@get']);
Route::get('/templates/get/{filename}', ['as' => 'getentry.template', 'uses' => 'Psp\Template\TemplateController@get']);
Route::get('/pspDocuments/get/{filename}', ['as' => 'getentry.pspDocument', 'uses' => 'Psp\PspDocument\PspDocumentController@get']);

// API endpoints
$api = app(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'Intranet\Http\Controllers\API'], function ($api) {
        $api->post('authenticate', 'Auth\AuthController@authenticate');

        $api->group(['middleware' => 'api.auth'], function ($api) {
            $api->get('users/me', 'User\UserController@getUserInfo');

            $api->group(['namespace' => 'Faculty', 'prefix' => 'faculties'], function($api) {
                $api->get('/', 'FacultyController@get');
                $api->get('/getFaculty/{faculty_id}','FacultyController@getSpecialty');
                $api->get('/{faculty_id}/educational-objectives', 'FacultyController@getEducationalObjectives');
                $api->get('/{faculty_id}/eob/{eos_id}/students_results', 'FacultyController@getStudentsResult');
                $api->get('/student_result/{sr_id}/aspects', 'FacultyController@getAspects');
                $api->get('/{faculty_id}/evaluated_courses', 'FacultyController@getEvaluatedCourses');
                $api->get('course/{course_id}/cycle/{academic_cycle_id}','FacultyController@getCourseSchedule');
                $api->get('/{faculty_id}/evaluated_courses/{course_id}/semesters/{semester_id}', 'FacultyController@getCourseReport');
                $api->get('/{faculty_id}/measure_report', 'FacultyController@getMeasureReport');
                $api->get('/{faculty_id}/suggestions', 'FacultyController@getSuggestions');
                $api->get('/{faculty_id}/improvement_plans', 'FacultyController@getImprovementsPlans');
                $api->get('/{id}/teachers', 'FacultyController@getTeachers');
                $api->get('/{f_id}/semester/{s_id}/courses', 'FacultyController@getEvaluatedCoursesBySemester');
                $api->get('/teacher/{teacher_id}/courses','FacultyController@getTeacherCourses');
            });

            $api->group(['namespace' => 'Period','prefix'=>'periods'],function($api){
                $api->get('/{f_id}/actual/semesters', 'PeriodController@getSemesters');
                $api->get('/{f_id}/list', 'PeriodController@getPeriodList');
                $api->get('/{p_id}/instruments', 'PeriodController@getMeasurementInstOfPeriod');
                $api->get('/{p_id}/cycles', 'PeriodController@getCyclesofPeriod');  
                $api->get('/{p_id}/show', 'PeriodController@getPeriodbyId');                          
                $api->get('/{p_id}/{f_id}/objectives', 'PeriodController@getEducationalObjectivesofPeriod');                          
            });


            $api->group(['namespace' => 'ImprovementPlan','prefix'=>'improvementplans'],function($api){
                $api->get('/{ip_id}/view', 'ImprovementPlanController@getipbyId');
                $api->get('/{ip_id}/actions', 'ImprovementPlanController@getActionsofIp');
                $api->get('/{ip_id}/suggestions','ImprovementPlanController@getSuggestion');
                $api->post('/{ip_id}/suggestions','ImprovementPlanController@createSuggestion');
                
            });



            $api->group(['namespace' => 'Aspect','prefix' => 'aspects'], function($api){
                $api->get('/{id}/criterions', 'AspectController@getCriterions');
            });

            $api->group(['namespace' => 'Criterion','prefix' => 'criterions'], function($api){
                $api->get('/{id}/levels', 'CriterionController@getLevels');
            });

            //PSP
            $api->group(['namespace' => 'Psp','prefix' => 'psp'],function($api){
                $api->get('groups/all','PspGroup\PspGroupController@getAll');
                $api->get('groups/{id}','PspGroup\PspGroupController@getById');
                $api->get('groups/number/{number}','PspGroup\PspGroupController@getByNumber');
                
                $api->get('student/group','PspGroup\PspGroupController@getGroupByStudent');
                $api->get('teacher/students/all','Students\PspStudentsController@getAll');
                $api->get('student','PspGroup\PspGroupController@getStudent');
                $api->get('students/{idStudent}/documents','Students\PspStudentsController@getDocumentsById');
                $api->get('students/documents','Students\PspStudentsController@getDocumentsAll');

                $api->get('students/all','Students\PspStudentsInscriptionFiles@getAll');
           
                $api->get('students/inscriptioFile','Students\PspStudentsInscriptionFiles@getInscriptions');
                $api->post('groups/selectGroup/{id}','PspGroup\PspGroupController@selectGroup');
                $api->get('phases/all','Phases\PspPhasesController@getAll');
                $api->post('students/{id}/sendInscriptioFile', 'Students\PspStudentsInscriptionFiles@edit');
            });

            //INVESTIGACION

            $api->group(['namespace' => 'Investigation','prefix' => 'investigation'], function($api){

                $api->get('/{id}/groups', 'Group\GroupController@getById');
                $api->post('/{id}/groups', 'Group\GroupController@edit');
                
                $api->get('/{id}/investigators', 'Investigator\InvestigatorController@getById');
                $api->post('/{id}/investigators', 'Investigator\InvestigatorController@edit');
                
                $api->get('/{id}/projects', 'Project\ProjectController@getById');
                $api->post('/{id}/projects', 'Project\ProjectController@edit');
                

                $api->get('/getAllInvestigators', 'Investigator\InvestigatorController@getAll');
                $api->get('/getAllInvGroups', 'Group\GroupController@getAll');
                $api->get('/getAllProjects', 'Project\ProjectController@getAll');

                $api->get('/{id}/deliverable', 'Deliverable\DeliverableController@getById');
                $api->post('/{id}/deliverable', 'Deliverable\DeliverableController@edit');
                $api->get('/{id}/deliverables', 'Deliverable\DeliverableController@getByProjectId');

                $api->get('/{id}/event', 'Event\EventController@getById');
                $api->post('/{id}/event', 'Event\EventController@edit');
                $api->get('/{id}/events', 'Event\EventController@getByGroupId');

            });

            
            //TUTORIA
            $api->get('getTopics', 'Tutoria\TopicController@getAll');
            $api->get('getTutorInfo/{id_usuario}','Tutoria\TutStudentController@getTutorById');
            $api->get('getTutorAppoints/{id_usuario}','Tutoria\TutTutorController@getTutorAppoints');
            $api->get('getAppointmentList/{id_usuario}', 'Tutoria\TutStudentController@getAppointmentList');
            $api->post('registerStudentAppointment', 'Tutoria\TutStudentController@postAppointment');
            $api->post('updateStudentAppointment', 'Tutoria\TutTutorController@updatePendienteAppointmentList');
            $api->post('cancelStudentAppointment', 'Tutoria\TutTutorController@cancelAppointmentList');

        });
    });

});

//NUEVAS RUTAS PARA SEGUNDA PARTE DEL PROYECTO

//Rutas publicas de investigacion
Route::group(['prefix' => 'investigacion'], function(){
    Route::get('/', ['as' => 'investigacion.index', 'uses' => 'Investigation\InvestigationController@index']);

    Route::group(['prefix' => 'investigador'], function(){
        Route::get('/', ['as' => 'investigador.index', 'uses' => 'Investigation\Investigator\InvestigatorController@index']);
        Route::get('show/{id}', ['as' => 'investigador.show', 'uses' => 'Investigation\Investigator\InvestigatorController@show']);
    });

    Route::group(['prefix' => 'grupo'], function(){
        Route::get('/', ['as' => 'grupo.index', 'uses' => 'Investigation\Group\GroupController@index']);
        Route::get('show/{id}', ['as' => 'grupo.show', 'uses' => 'Investigation\Group\GroupController@show']);
    });

    Route::group(['prefix' => 'evento'], function(){
        Route::get('/', ['as' => 'evento.index', 'uses' => 'Investigation\Event\EventController@index']);
        Route::get('show/{id}', ['as' => 'evento.show', 'uses' => 'Investigation\Event\EventController@show']);
    });

    Route::group(['prefix' => 'proyecto'], function(){    
        Route::get('/', ['as' => 'proyecto.index', 'uses' => 'Investigation\Project\ProjectController@index']);
        Route::get('show/{id}', ['as' => 'proyecto.show', 'uses' => 'Investigation\Project\ProjectController@show']);
    });    

    Route::group(['prefix' => 'entregable'], function(){
        Route::get('download/{id}', ['as' => 'entregable.download', 'uses' => 'Investigation\Deliverable\DeliverableController@download']);
    });

    //Reportes de Investigación
    Route::group(['prefix' => 'reporteISA'], function(){
        Route::get('/', ['as' => 'reporteISA.index', 'uses' => 'Report\ReportController@indexISA']);
        Route::post('/generateISA', ['as' => 'reporteISA.generateISA', 'uses' => 'Report\ReportController@generateISA']);
        Route::get('show/{id}', ['as' => 'reporteISA.show', 'uses' => 'Report\ReportController@show']);
    });

    Route::group(['prefix' => 'reporteISP'], function(){
        Route::get('/', ['as' => 'reporteISP.index', 'uses' => 'Report\ReportController@indexISP']);
        Route::post('/generateISP', ['as' => 'reporteISP.generateISP', 'uses' => 'Report\ReportController@generateISP']);
        Route::get('/test/', ['as' => 'reporteISP.generarPDF', 'uses' => 'Report\ReportController@generarPDF']);
    });
});

//Rutas privadas
Route::group(['middleware' => 'auth'], function(){  

    Route::group(['prefix' => 'status'], function(){    
        Route::get('/', ['as' => 'status.indexType', 'uses' => 'Status\StatusController@indexType']);
        Route::get('index/{id}', ['as' => 'status.index', 'uses' => 'Status\StatusController@index']);
        Route::get('create', ['as' => 'status.create', 'uses' => 'Status\StatusController@create']);
        Route::post('create', ['as' => 'status.store', 'uses' => 'Status\StatusController@store']);
        Route::get('edit/{id}', ['as' => 'status.edit', 'uses' => 'Status\StatusController@edit']);
        Route::post('edit/{id}', ['as' => 'status.update', 'uses' => 'Status\StatusController@update']);
        Route::get('delete/{id}', ['as' => 'status.delete', 'uses' => 'Status\StatusController@destroy']);
    });

    Route::group(['middleware' => 'investigation'], function(){

        Route::group(['prefix' => 'investigacion'], function(){

            //Home de investigacion
            //Route::get('/', ['as' => 'investigation.index', 'uses' => 'Investigation\InvestigationController@index']);

            //Administrar Investigador
            Route::group(['prefix' => 'investigador'], function(){
                //Route::get('/', ['as' => 'investigador.index', 'uses' => 'Investigation\Investigator\InvestigatorController@index']);
                //Route::get('show/{id}', ['as' => 'investigador.show', 'uses' => 'Investigation\Investigator\InvestigatorController@show']);
                Route::get('create', ['as' => 'investigador.create', 'uses' => 'Investigation\Investigator\InvestigatorController@create']);
                Route::post('create', ['as' => 'investigador.store', 'uses' => 'Investigation\Investigator\InvestigatorController@store']);
                Route::get('edit/{id}', ['as' => 'investigador.edit', 'uses' => 'Investigation\Investigator\InvestigatorController@edit']);
                Route::post('edit/{id}', ['as' => 'investigador.update', 'uses' => 'Investigation\Investigator\InvestigatorController@update']);
                Route::get('delete/{id}', ['as' => 'investigador.delete', 'uses' => 'Investigation\Investigator\InvestigatorController@destroy']);
            });

            //Administrar Grupo de Investigacion
            Route::group(['prefix' => 'grupo'], function(){
                //Route::get('/', ['as' => 'grupo.index', 'uses' => 'Investigation\Group\GroupController@index']);
                Route::get('create', ['as' => 'grupo.create', 'uses' => 'Investigation\Group\GroupController@create']);
                Route::post('create', ['as' => 'grupo.store', 'uses' => 'Investigation\Group\GroupController@store']);
                Route::get('edit/{id}', ['as' => 'grupo.edit', 'uses' => 'Investigation\Group\GroupController@edit']);
                Route::post('edit/{id}', ['as' => 'grupo.update', 'uses' => 'Investigation\Group\GroupController@update']);
                Route::get('delete/{id}', ['as' => 'grupo.delete', 'uses' => 'Investigation\Group\GroupController@destroy']);
                //Route::get('show/{id}', ['as' => 'grupo.show', 'uses' => 'Investigation\Group\GroupController@show']);

                //Seleccion de integrantes de grupo de investigacion
                Route::group(['prefix' => 'afiliacion'], function(){
                    Route::post('createInvestigator', ['as' => 'grupo.afiliacion.store.investigador', 'uses' => 'Investigation\Group\Affiliation\AffiliationController@storeInvestigator']);
                    Route::get('deleteInvestigator/{id}', ['as' => 'grupo.afiliacion.delete.investigador', 'uses' => 'Investigation\Group\Affiliation\AffiliationController@destroyInvestigator']);

                    Route::post('createTeacher', ['as' => 'grupo.afiliacion.store.docente', 'uses' => 'Investigation\Group\Affiliation\AffiliationController@storeTeacher']);
                    Route::get('deleteTeacher/{id}', ['as' => 'grupo.afiliacion.delete.docente', 'uses' => 'Investigation\Group\Affiliation\AffiliationController@destroyTeacher']);

                    Route::post('createStudent', ['as' => 'grupo.afiliacion.store.estudiante', 'uses' => 'Investigation\Group\Affiliation\AffiliationController@storeStudent']);
                    Route::get('deleteStudent/{id}', ['as' => 'grupo.afiliacion.delete.estudiante', 'uses' => 'Investigation\Group\Affiliation\AffiliationController@destroyStudent']);
                });
            });    

            //Administrar eventos

            Route::group(['prefix' => 'evento'], function(){
                //Route::get('/', ['as' => 'evento.index', 'uses' => 'Investigation\Event\EventController@index']);
                Route::get('create', ['as' => 'evento.create', 'uses' => 'Investigation\Event\EventController@create']);
                Route::post('create', ['as' => 'evento.store', 'uses' => 'Investigation\Event\EventController@store']);
                //Route::get('show/{id}', ['as' => 'evento.show', 'uses' => 'Investigation\Event\EventController@show']);
                Route::get('edit/{id}', ['as' => 'evento.edit', 'uses' => 'Investigation\Event\EventController@edit']);
                Route::post('edit/{id}', ['as' => 'evento.update', 'uses' => 'Investigation\Event\EventController@update']);
                Route::get('delete/{id}', ['as' => 'evento.delete', 'uses' => 'Investigation\Event\EventController@destroy']);
            }); 

            //Administrar areas

            Route::group(['prefix' => 'area'], function(){    
                Route::get('/', ['as' => 'area.index', 'uses' => 'Investigation\Area\AreaController@index']);
                Route::get('create', ['as' => 'area.create', 'uses' => 'Investigation\Area\AreaController@create']);
                Route::post('create', ['as' => 'area.store', 'uses' => 'Investigation\Area\AreaController@store']);
                //Route::get('show/{id}', ['as' => 'area.show', 'uses' => 'Investigation\Area\AreaController@show']);
                Route::get('edit/{id}', ['as' => 'area.edit', 'uses' => 'Investigation\Area\AreaController@edit']);
                Route::post('edit/{id}', ['as' => 'area.update', 'uses' => 'Investigation\Area\AreaController@update']);
                Route::get('delete/{id}', ['as' => 'area.delete', 'uses' => 'Investigation\Area\AreaController@destroy']);
            });

            //Administrar proyectos
            
            Route::group(['prefix' => 'proyecto'], function(){    
                //Route::get('/', ['as' => 'proyecto.index', 'uses' => 'Investigation\Project\ProjectController@index']);
                Route::get('create', ['as' => 'proyecto.create', 'uses' => 'Investigation\Project\ProjectController@create']);
                Route::post('create', ['as' => 'proyecto.store', 'uses' => 'Investigation\Project\ProjectController@store']);
                //Route::get('show/{id}', ['as' => 'proyecto.show', 'uses' => 'Investigation\Project\ProjectController@show']);
                Route::get('edit/{id}', ['as' => 'proyecto.edit', 'uses' => 'Investigation\Project\ProjectController@edit']);
                Route::post('edit/{id}', ['as' => 'proyecto.update', 'uses' => 'Investigation\Project\ProjectController@update']);
                Route::get('delete/{id}', ['as' => 'proyecto.delete', 'uses' => 'Investigation\Project\ProjectController@destroy']);
                Route::get('/getProject/{id}', ['as' => 'proyecto.ajax.getProject', 'uses' => 'Investigation\Project\ProjectController@getProject']);

                //Seleccion de integrantes de proyecto
                Route::group(['prefix' => 'afiliacion'], function(){
                    Route::post('createInvestigator', ['as' => 'proyecto.afiliacion.store.investigador', 'uses' => 'Investigation\Project\Affiliation\AffiliationController@storeInvestigator']);
                    Route::get('deleteInvestigator/{id}', ['as' => 'proyecto.afiliacion.delete.investigador', 'uses' => 'Investigation\Project\Affiliation\AffiliationController@destroyInvestigator']);

                    Route::post('createTeacher', ['as' => 'proyecto.afiliacion.store.docente', 'uses' => 'Investigation\Project\Affiliation\AffiliationController@storeTeacher']);
                    Route::get('deleteTeacher/{id}', ['as' => 'proyecto.afiliacion.delete.docente', 'uses' => 'Investigation\Project\Affiliation\AffiliationController@destroyTeacher']);

                    Route::post('createStudent', ['as' => 'proyecto.afiliacion.store.estudiante', 'uses' => 'Investigation\Project\Affiliation\AffiliationController@storeStudent']);
                    Route::get('deleteStudent/{id}', ['as' => 'proyecto.afiliacion.delete.estudiante', 'uses' => 'Investigation\Project\Affiliation\AffiliationController@destroyStudent']);
                });
            });

            //Administrar entregables
            
            Route::group(['prefix' => 'entregable'], function(){    
                Route::get('/{id}', ['as' => 'entregable.index', 'uses' => 'Investigation\Deliverable\DeliverableController@index']);
                Route::get('create/{id}', ['as' => 'entregable.create', 'uses' => 'Investigation\Deliverable\DeliverableController@create']);
                Route::post('create', ['as' => 'entregable.store', 'uses' => 'Investigation\Deliverable\DeliverableController@store']);
                Route::get('show/{id}', ['as' => 'entregable.show', 'uses' => 'Investigation\Deliverable\DeliverableController@show']);
                Route::get('edit/{id}', ['as' => 'entregable.edit', 'uses' => 'Investigation\Deliverable\DeliverableController@edit']);
                Route::post('edit/{id}', ['as' => 'entregable.update', 'uses' => 'Investigation\Deliverable\DeliverableController@update']);
                Route::post('upload/{id}', ['as' => 'entregable.upload', 'uses' => 'Investigation\Deliverable\DeliverableController@upload']);
                Route::get('delete/{id}', ['as' => 'entregable.delete', 'uses' => 'Investigation\Deliverable\DeliverableController@destroy']);
                Route::get('delete/version/{id}', ['as' => 'entregable.deleteVersion', 'uses' => 'Investigation\Deliverable\DeliverableController@destroyVersion']);
                //Route::get('download/{id}', ['as' => 'entregable.download', 'uses' => 'Investigation\Deliverable\DeliverableController@download']);
                Route::get('notification/{id}', ['as' => 'entregable.notify', 'uses' => 'Investigation\Deliverable\DeliverableController@notify']);
                Route::get('/show/{id}/viewVersion', ['as' => 'entregable.viewVersion', 'uses' => 'Investigation\Deliverable\DeliverableController@viewVersion']);
                Route::post('/saveObservation', ['as' => 'entregable.saveObservation', 'uses' => 'Investigation\Deliverable\DeliverableController@saveObservation']);
                Route::post('/search', ['uses' => 'Teacher\TeacherController@searchModal']);    
                Route::get('/getDeliverable/{id}', ['as' => 'entregable.ajax.getDeliverable', 'uses' => 'Investigation\Deliverable\DeliverableController@getDeliverable']);

                //Seleccion de integrantes de proyecto
                Route::group(['prefix' => 'afiliacion'], function(){
                    Route::post('createInvestigator', ['as' => 'entregable.afiliacion.store.investigador', 'uses' => 'Investigation\Deliverable\Affiliation\AffiliationController@storeInvestigator']);
                    Route::get('deleteInvestigator/{id}', ['as' => 'entregable.afiliacion.delete.investigador', 'uses' => 'Investigation\Deliverable\Affiliation\AffiliationController@destroyInvestigator']);

                    Route::post('createTeacher', ['as' => 'entregable.afiliacion.store.docente', 'uses' => 'Investigation\Deliverable\Affiliation\AffiliationController@storeTeacher']);
                    Route::get('deleteTeacher/{id}', ['as' => 'entregable.afiliacion.delete.docente', 'uses' => 'Investigation\Deliverable\Affiliation\AffiliationController@destroyTeacher']);

                    Route::post('createStudent', ['as' => 'entregable.afiliacion.store.estudiante', 'uses' => 'Investigation\Deliverable\Affiliation\AffiliationController@storeStudent']);
                    Route::get('deleteStudent/{id}', ['as' => 'entregable.afiliacion.delete.estudiante', 'uses' => 'Investigation\Deliverable\Affiliation\AffiliationController@destroyStudent']);
                });
                
            });
            
        });


});  



    //MODULO UAS PARA TUTORIA
Route::group(['prefix' => 'uas'], function(){
        //Coordinadores de tutoria
    Route::group(['prefix' => 'coordinadoresTutoria'], function(){    
        Route::get('/', ['as' => 'coordinadorTutoria.index', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@index']);
        Route::get('create', ['as' => 'coordinadorTutoria.create', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@create']);
        Route::post('create', ['as' => 'coordinadorTutoria.store', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@store']);
        Route::get('show/{id}', ['as' => 'coordinadorTutoria.show', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@show']);
        Route::get('edit/{id}', ['as' => 'coordinadorTutoria.edit', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@edit']);
        Route::post('edit/{id}', ['as' => 'coordinadorTutoria.update', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@update']);
        Route::get('delete/{id}', ['as' => 'coordinadorTutoria.delete', 'uses' => 'Tutorship\CoordTutorship\CoordTutorshipController@destroy']);
    });


});


//MODULO DE TUTORIA - Inicio de rutas

Route::group(['prefix' => 'tutoria'], function(){

    /***   PARA EL COORDINADOR DE TUTORÍA   ***/

    //Configuraciones
    Route::group(['prefix' => 'parametros'], function(){   
        //Configuracions de duracion de cita
        Route::get('duracion/', ['as' => 'parametro.index.duration', 'uses' => 'Tutorship\Parameter\ParameterController@indexDuration']);
        Route::post('duracion/edit', ['as' => 'parametro.update.duration', 'uses' => 'Tutorship\Parameter\ParameterController@updateDuration']);

        //Configuracion de temas de cita
        Route::group(['prefix' => 'temas'], function(){    
            Route::get('/', ['as' => 'tema.index', 'uses' => 'Tutorship\Topic\TopicController@index']);
            Route::get('create', ['as' => 'tema.create', 'uses' => 'Tutorship\Topic\TopicController@create']);
            Route::post('create', ['as' => 'tema.store', 'uses' => 'Tutorship\Topic\TopicController@store']);
            Route::get('show/{id}', ['as' => 'tema.show', 'uses' => 'Tutorship\Topic\TopicController@show']);
            Route::get('edit/{id}', ['as' => 'tema.edit', 'uses' => 'Tutorship\Topic\TopicController@edit']);
            Route::post('edit/{id}', ['as' => 'tema.update', 'uses' => 'Tutorship\Topic\TopicController@update']);
            Route::get('delete/{id}', ['as' => 'tema.delete', 'uses' => 'Tutorship\Topic\TopicController@destroy']);
        });

        //Configuracion de motivos de cita
        Route::group(['prefix' => 'motivos'], function(){    
            Route::get('/', ['as' => 'motivo.index', 'uses' => 'Tutorship\Reason\ReasonController@index']);
            Route::get('create', ['as' => 'motivo.create', 'uses' => 'Tutorship\Reason\ReasonController@create']);
            Route::post('create', ['as' => 'motivo.store', 'uses' => 'Tutorship\Reason\ReasonController@store']);
            Route::get('show/{id}', ['as' => 'motivo.show', 'uses' => 'Tutorship\Reason\ReasonController@show']);
            Route::get('edit/{id}', ['as' => 'motivo.edit', 'uses' => 'Tutorship\Reason\ReasonController@edit']);
            Route::post('edit/{id}', ['as' => 'motivo.update', 'uses' => 'Tutorship\Reason\ReasonController@update']);
            Route::get('delete/{id}', ['as' => 'motivo.delete', 'uses' => 'Tutorship\Reason\ReasonController@destroy']);
        });
    });


    //Tutores
    Route::group(['prefix' => 'tutores'], function(){    
        Route::get('/', ['as' => 'tutor.index', 'uses' => 'Tutorship\Tutor\TutorController@index']);
        Route::get('create', ['as' => 'tutor.create', 'uses' => 'Tutorship\Tutor\TutorController@create']);
        Route::post('create', ['as' => 'tutor.store', 'uses' => 'Tutorship\Tutor\TutorController@store']);
        Route::get('show/{id}', ['as' => 'tutor.show', 'uses' => 'Tutorship\Tutor\TutorController@show']);
        Route::get('edit/{id}', ['as' => 'tutor.edit', 'uses' => 'Tutorship\Tutor\TutorController@edit']);
        Route::post('edit/{id}', ['as' => 'tutor.update', 'uses' => 'Tutorship\Tutor\TutorController@update']);
        Route::get('delete/{id}', ['as' => 'tutor.delete', 'uses' => 'Tutorship\Tutor\TutorController@destroy']);
        Route::get('reassign/{id}', ['as' => 'tutor.reassign', 'uses' => 'Tutorship\Tutor\TutorController@reassign']);
        Route::post('reassign/{id}', ['as' => 'tutor.deactivate', 'uses' => 'Tutorship\Tutor\TutorController@deactivate']);
        Route::get('activate/{id}', ['as' => 'tutor.activate', 'uses' => 'Tutorship\Tutor\TutorController@activate']);
    });
                
        
    //Alumnos de la especialidad
    Route::group(['prefix' => 'alumnos'], function(){    
        Route::get('/', ['as' => 'alumno.index', 'uses' => 'Tutorship\Tutstudent\TutstudentController@index']);
        Route::get('create', ['as' => 'alumno.create', 'uses' => 'Tutorship\Tutstudent\TutstudentController@create']);
        Route::get('createAll', ['as' => 'alumno.createAll', 'uses' => 'Tutorship\Tutstudent\TutstudentController@createAll']);
        Route::post('create', ['as' => 'alumno.store', 'uses' => 'Tutorship\Tutstudent\TutstudentController@store']);
        Route::post('createAll', ['as' => 'alumno.storeAll', 'uses' => 'Tutorship\Tutstudent\TutstudentController@storeAll']);
        Route::get('show/{id}', ['as' => 'alumno.show', 'uses' => 'Tutorship\Tutstudent\TutstudentController@show']);
        Route::get('edit/{id}', ['as' => 'alumno.edit', 'uses' => 'Tutorship\Tutstudent\TutstudentController@edit']);
        Route::post('edit/{id}', ['as' => 'alumno.update', 'uses' => 'Tutorship\Tutstudent\TutstudentController@update']);
        Route::get('delete/{id}', ['as' => 'alumno.delete', 'uses' => 'Tutorship\Tutstudent\TutstudentController@destroy']);
        Route::get('restore/{id}', ['as' => 'alumno.restore', 'uses' => 'Tutorship\Tutstudent\TutstudentController@restore']);
        Route::get('asignartutores', ['as' => 'alumno.asignar', 'uses' => 'Tutorship\Tutstudent\TutstudentController@assignTutor']);
        Route::post('asignartutores', ['as' => 'alumno.asignardo', 'uses' => 'Tutorship\Tutstudent\TutstudentController@assignTutorDo']);
        Route::get('example', ['as' => 'alumno.example', 'uses' => 'Tutorship\Tutstudent\TutstudentController@downLoadExample']);
    });

    //Reportes
    Route::group(['prefix' => 'reporte'], function(){    
        Route::get('/meeting', ['as' => 'reporte.meeting', 'uses' => 'Tutorship\Report\ReportController@meetingReport']);                    
        Route::get('/reassign', ['as' => 'reporte.reassign', 'uses' => 'Tutorship\Report\ReportController@reassignReport']);
    });

    /***   PARA EL ALUMNO DE TUTORÍA   ***/

    //Mitutor
    Route::group(['prefix' => 'mitutor'], function(){    
        Route::get('/', ['as' => 'mitutor.index', 'uses' => 'Tutorship\MyTutor\MyTutorController@index']); 
    });

    /***   PARA EL TUTOR DE TUTORÍA   ***/

    //Miperfil
    Route::group(['prefix' => 'miperfil'], function(){    
        Route::get('/', ['as' => 'miperfil.index', 'uses' => 'Tutorship\TutSchedule\TutScheduleController@index']);
        Route::get('edit/{id}', ['as' => 'miperfil.edit', 'uses' => 'Tutorship\TutSchedule\TutScheduleController@edit']);
        Route::post('edit/{id}', ['as' => 'miperfil.update', 'uses' => 'Tutorship\TutSchedule\TutScheduleController@update']);            
    });
        
    //Mis Alumnos
    Route::group(['prefix' => 'misalumnos'], function(){    
        Route::get('/', ['as' => 'mis_alumnos.index', 'uses' => 'Tutorship\TutMeeting\TutMeetingController@indexMyStudents']);
        Route::get('show/{id}', ['as' => 'mis_alumnos.show', 'uses' => 'Tutorship\TutMeeting\TutMeetingController@showMyStudent']);
        
    });

    //Mis Citas
    Route::group(['prefix' => 'miscitas'], function(){    
        Route::get('/', ['as' => 'cita_alumno.index', 'uses' => 'Tutorship\TutMeeting\TutMeetingController@indexMyDates']);
        Route::get('/create/{id}', ['as' => 'cita_alumno.create', 'uses' => 'Tutorship\TutMeeting\TutMeetingController@createDate']);
        
    });
});
//MODULO DE TUTORIA - Fin de rutas

    //Acreditacion - flujo administrador:
    Route::group(['prefix' => 'flujoAdministrador'], function() {
        Route::get('/', ['as' => 'index.flujoAdministrador', 'uses' => 'FlujoAdministradorController@index']);
        Route::get('/create', ['as' => 'create.flujoAdministrador', 'uses' => 'FlujoAdministradorController@create']);
        Route::post('/save', ['as' => 'save.flujoAdministrador', 'uses' => 'FlujoAdministradorController@save']);
        Route::get('/edit/{id}', ['as' => 'edit.flujoAdministrador', 'uses' => 'FlujoAdministradorController@edit']);
        Route::post('/update', ['as' => 'update.flujoAdministrador', 'uses' => 'FlujoAdministradorController@update']);
        Route::get('/delete', ['as' => 'delete.flujoAdministrador', 'uses' => 'FlujoAdministradorController@delete']);

        Route::post('/facultad', ['as' => 'facultad_store.flujoAdministrador', 'uses' => 'FlujoAdministradorController@facultad_store']);
        Route::get('/facultad', ['as' => 'facultad_create.flujoAdministrador', 'uses' => 'FlujoAdministradorController@facultad_create']);
        Route::get('/facultad/edit/{id}', ['as' => 'facultad_edit.flujoAdministrador', 'uses' => 'FlujoAdministradorController@facultad_edit']);
        Route::post('/facultad/update', ['as' => 'facultad_update.flujoAdministrador', 'uses' => 'FlujoAdministradorController@facultad_update']);

        Route::get('/facultad/{id}/profesor', ['as' => 'profesor_index.flujoAdministrador', 'uses' => 'FlujoAdministradorController@profesor_index']);
        Route::get('/facultad/{id}/profesor/create', ['as' => 'profesor_create.flujoAdministrador', 'uses' => 'FlujoAdministradorController@profesor_create']);        
        Route::post('/facultad/{id}/profesor/store', ['as' => 'profesor_store.flujoAdministrador', 'uses' => 'FlujoAdministradorController@profesor_store']);
        Route::post('/facultad/{id}/coordinador/store', ['as' => 'coordinador_store.flujoAdministrador', 'uses' => 'FlujoAdministradorController@coordinador_store']);
    
        Route::get('/academicCycle', ['as' => 'academicCycle_index.flujoAdministrador', 'uses' => 'FlujoAdministradorController@academicCycle_index']);
        Route::get('/academicCycle/create', ['as' => 'academicCycle_create.flujoAdministrador', 'uses' => 'FlujoAdministradorController@academicCycle_create']);        
        Route::post('/academicCycle/store', ['as' => 'academicCycle_store.flujoAdministrador', 'uses' => 'FlujoAdministradorController@academicCycle_store']);
        Route::get('/end', ['as' => 'end.flujoAdministrador', 'uses' => 'FlujoAdministradorController@end']);
    });
    
    //MODULO UAS PARA EVALUACIONES
    Route::group(['prefix' => 'uas'], function(){
        //Administrador de evaluaciones
        Route::group(['prefix' => 'coordinadoresEvaluaciones'], function(){    
            Route::get('/', ['as' => 'coordinadorEvaluaciones.index', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@index']);
            Route::get('create', ['as' => 'coordinadorEvaluaciones.create', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@create']);
            Route::post('create', ['as' => 'coordinadorEvaluaciones.store', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@store']);
            Route::get('show/{id}', ['as' => 'coordinadorEvaluaciones.show', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@show']);
            Route::get('edit/{id}', ['as' => 'coordinadorEvaluaciones.edit', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@edit']);
            Route::post('edit/{id}', ['as' => 'coordinadorEvaluaciones.update', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@update']);
            Route::get('delete/{id}', ['as' => 'coordinadorEvaluaciones.delete', 'uses' => 'Evaluations\CoordEvaluations\CoordEvaluationsController@destroy']);
        });


    });

    //MODULO DE EVALUACIONES
    Route::group(['prefix' => 'evaluaciones'], function(){
        //Competencias
        Route::group(['prefix' => 'competencias'], function(){    
            Route::get('/', ['as' => 'competencia.index', 'uses' => 'Evaluations\Competence\CompetenceController@index']);
            Route::get('create', ['as' => 'competencia.create', 'uses' => 'Evaluations\Competence\CompetenceController@create']);
            Route::post('create', ['as' => 'competencia.store', 'uses' => 'Evaluations\Competence\CompetenceController@store']);
            Route::get('show/{id}', ['as' => 'competencia.show', 'uses' => 'Evaluations\Competence\CompetenceController@show']);
            Route::get('edit/{id}', ['as' => 'competencia.edit', 'uses' => 'Evaluations\Competence\CompetenceController@edit']);
            Route::post('edit/{id}', ['as' => 'competencia.update', 'uses' => 'Evaluations\Competence\CompetenceController@update']);
            Route::get('delete/{id}', ['as' => 'competencia.delete', 'uses' => 'Evaluations\Competence\CompetenceController@destroy']);
        });

        //Preguntas maestras
        Route::group(['prefix' => 'preguntas'], function(){    
            Route::get('/', ['as' => 'pregunta.index', 'uses' => 'Evaluations\Question\QuestionController@index']);
            Route::get('create', ['as' => 'pregunta.create', 'uses' => 'Evaluations\Question\QuestionController@create']);
            Route::post('create', ['as' => 'pregunta.store', 'uses' => 'Evaluations\Question\QuestionController@store']);
            Route::get('show/{id}', ['as' => 'pregunta.show', 'uses' => 'Evaluations\Question\QuestionController@show']);
            Route::get('edit/{id}', ['as' => 'pregunta.edit', 'uses' => 'Evaluations\Question\QuestionController@edit']);
            Route::post('edit/{id}', ['as' => 'pregunta.update', 'uses' => 'Evaluations\Question\QuestionController@update']);
            Route::get('delete/{id}', ['as' => 'pregunta.delete', 'uses' => 'Evaluations\Question\QuestionController@destroy']);

            //AJAX
            Route::post('search', ['as' => 'pregunta.buscar','uses' => 'Evaluations\Question\QuestionController@searchModalEv']);//NO TOCAR!
            Route::get('editQuestion', ['as' => 'pregunta.editar','uses' => 'Evaluations\Question\QuestionController@editQuestionModalEv']);//NO TOCAR!
            
        });




        //Evaluadores
        Route::group(['prefix' => 'evaluadores'], function(){    
            Route::get('/', ['as' => 'evaluador.index', 'uses' => 'Evaluations\Evaluator\EvaluatorController@index']);
            Route::get('create', ['as' => 'evaluador.create', 'uses' => 'Evaluations\Evaluator\EvaluatorController@create']);
            Route::post('create', ['as' => 'evaluador.store', 'uses' => 'Evaluations\Evaluator\EvaluatorController@store']);
            Route::get('show/{id}', ['as' => 'evaluador.show', 'uses' => 'Evaluations\Evaluator\EvaluatorController@show']);
            Route::get('edit/{id}', ['as' => 'evaluador.edit', 'uses' => 'Evaluations\Evaluator\EvaluatorController@edit']);
            Route::post('edit/{id}', ['as' => 'evaluador.update', 'uses' => 'Evaluations\Evaluator\EvaluatorController@update']);
            Route::get('delete/{id}', ['as' => 'evaluador.delete', 'uses' => 'Evaluations\Evaluator\EvaluatorController@destroy']);
        });

        //Evaluaciones
        Route::group(['prefix' => 'evaluaciones'], function(){    
            Route::get('/', ['as' => 'evaluacion.index', 'uses' => 'Evaluations\Evaluation\EvaluationController@index']);
            Route::get('evaluador', ['as' => 'evaluacion_evaluador.index', 'uses' => 'Evaluations\Evaluation\EvaluationController@indexev']);
            Route::get('evaluaciones_alumnos_coord/{id}', ['as' => 'evaluacion.ver_evaluaciones_alumnos_coord', 'uses' => 'Evaluations\Evaluation\EvaluationController@indexevalcoord']);
            Route::get('dar_permiso/{id}{ev}', ['as' => 'evaluacion.dar_permiso', 'uses' => 'Evaluations\Evaluation\EvaluationController@darPermisoExtra']);
            Route::get('evaluaciones_alumnos/{id}', ['as' => 'evaluacion.ver_evaluaciones_alumnos', 'uses' => 'Evaluations\Evaluation\EvaluationController@indexeval']);
            Route::get('evaluaciones_resultados/{id}', ['as' => 'evaluacion_resultados.index', 'uses' => 'Evaluations\Evaluation\EvaluationController@indexresults']);
            Route::get('evaluaciones_mis_resultados/{id}{ev}', ['as' => 'evaluacion.mis_resultados', 'uses' => 'Evaluations\Evaluation\EvaluationController@myresults']);
            Route::get('enviar_resultados/{id}', ['as' => 'evaluacion.enviar_resultados', 'uses' => 'Evaluations\Evaluation\EvaluationController@sendresults']);
            Route::get('corregir/{id}{ev}', ['as' => 'evaluacion.corregir', 'uses' => 'Evaluations\Evaluation\EvaluationController@corregir']);
            Route::get('show_corregida/{id}', ['as' => 'evaluacion_corregida.show', 'uses' => 'Evaluations\Evaluation\EvaluationController@vercorregida']);
            Route::post('corregida/{id}{ev}', ['as' => 'evaluacion_corregida.store', 'uses' => 'Evaluations\Evaluation\EvaluationController@storeEvCorregida']);
            Route::get('descargar/{id}', ['as' => 'evaluacion.descargar_respuesta', 'uses' => 'Evaluations\Evaluation\EvaluationController@download_evquestion']);
            Route::get('alumno', ['as' => 'evaluacion_alumno.index', 'uses' => 'Evaluations\Evaluation\EvaluationController@indexal']);
            Route::get('create', ['as' => 'evaluacion.create', 'uses' => 'Evaluations\Evaluation\EvaluationController@create']);
            Route::post('create', ['as' => 'evaluacion.store', 'uses' => 'Evaluations\Evaluation\EvaluationController@store']);
            Route::post('rendir_eval', ['as' => 'evaluacion_alumno.store', 'uses' => 'Evaluations\Evaluation\EvaluationController@storeEv']);
            Route::get('show/{id}', ['as' => 'evaluacion.show', 'uses' => 'Evaluations\Evaluation\EvaluationController@show']);
            Route::get('rendir/{id}', ['as' => 'evaluacion.rendir', 'uses' => 'Evaluations\Evaluation\EvaluationController@rendir']);
            Route::get('rendirev/{id}', ['as' => 'evaluacion.rendirev', 'uses' => 'Evaluations\Evaluation\EvaluationController@rendirEv']);
            Route::get('edit/{id}', ['as' => 'evaluacion.edit', 'uses' => 'Evaluations\Evaluation\EvaluationController@edit']);
            Route::post('edit/{id}', ['as' => 'evaluacion.update', 'uses' => 'Evaluations\Evaluation\EvaluationController@update']);
            Route::get('delete/{id}', ['as' => 'evaluacion.delete', 'uses' => 'Evaluations\Evaluation\EvaluationController@destroy']);
            Route::get('cancel/{id}', ['as' => 'evaluacion.cancel', 'uses' => 'Evaluations\Evaluation\EvaluationController@cancel']);
            Route::get('activate/{id}', ['as' => 'evaluacion.activate', 'uses' => 'Evaluations\Evaluation\EvaluationController@activate']);
        });
    });

    //Acreditacion - flujo coordinador:
    Route::group(['prefix' => 'flujoCoordinador'], function() {
        Route::get('/', ['as' => 'index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@index']);
        Route::get('/{id}/objetivoEducacional', ['as' => 'objetivoEducacional_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@objetivoEducacional_index']);
        Route::get('/{id}/objetivoEducacional/create', ['as' => 'objetivoEducacional_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@objetivoEducacional_create']);        
        Route::post('/{id}/objetivoEducacional/store', ['as' => 'objetivoEducacional_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@objetivoEducacional_store']);
        
        Route::get('/{id}/studentResult', ['as' => 'studentResult_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@studentResult_index']);
        Route::get('/{id}/studentResult/create', ['as' => 'studentResult_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@studentResult_create']);        
        Route::post('/{id}/studentResult/store', ['as' => 'studentResult_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@studentResult_store']);

        Route::get('/{id}/aspect', ['as' => 'aspect_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@aspect_index']);
        Route::post('/{id}/aspect/create', ['as' => 'aspect_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@aspect_create']);
        Route::post('/{id}/aspect/store', ['as' => 'aspect_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@aspect_store']);
    
        Route::get('/{id}/criterio', ['as' => 'criterio_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@criterio_index']);
        Route::get('/{id}/criterio/create', ['as' => 'criterio_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@criterio_create']);        
        Route::post('/{id}/criterio/store', ['as' => 'criterio_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@criterio_store']);

        Route::get('/{id}/courses', ['as' => 'courses_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@courses_index']);
        Route::get('/{id}/courses/create', ['as' => 'courses_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@courses_create']);
        Route::post('/{id}/courses/store', ['as' => 'courses_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@courses_store']);
        Route::get('/{id}/courses/{idCourse}/edit', ['as' => 'courses_edit.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@courses_edit']);
        Route::post('/{id}/courses/update', ['as' => 'courses_update.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@courses_update']);
        Route::get('/courses/{idCourse}/delete', ['as' => 'courses_delete.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@courses_delete']);


        /* cursos en el ciclo */        
        Route::get('/{id}/cursosCiclo', ['as' => 'cursosCiclo_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCiclo_index']);
        // agregar cursos de la especialidad
        Route::get('/{id}/cursosCiclo/edit', ['as' => 'cursosCiclo_edit.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCiclo_edit']);
        Route::post('/{id}/cursosCiclo/update', ['as' => 'cursosCiclo_update.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCiclo_update']);
        // asignar horarios a los cursos 
        Route::get('/{id}/horario/{idCourse}', ['as' => 'cursosCicloHorario_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCicloHorario_index']);
        Route::get('/{id}/horario/{idCourse}/create', ['as' => 'cursosCicloHorario_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCicloHorario_create']);
        Route::post('/{id}/horario/{idCourse}/store',['as'=>'cursosCicloHorario_store.flujoCoordinador','uses'=>'FlujoCoordinadorController@cursosCicloHorario_store']);
        Route::get('/{id}/horario/{idCourse}/edit/{idTimetable}', ['as' => 'cursosCicloHorario_edit.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCicloHorario_edit']);
        Route::post('/{id}/horario/{idCourse}/update/{idTimetable}',['as'=>'cursosCicloHorario_update.flujoCoordinador','uses'=>'FlujoCoordinadorController@cursosCicloHorario_update']);
        Route::get('/horario/{idCourse}/delete/{idTimetable}', ['as' => 'cursosCicloHorario_delete.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@cursosCicloHorario_delete']);


        Route::get('/{id}/end1', ['as' => 'end1.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@end1']);

        Route::get('/{id}/instrumento', ['as' => 'instrumento_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@instrumento_index']);
        Route::get('/{id}/instrumento/create', ['as' => 'instrumento_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@instrumento_create']);        
        Route::post('/{id}/instrumento/store', ['as' => 'instrumento_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@instrumento_store']);
        
        Route::get('/{id}/contributions', ['as' => 'contributions.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@contributions']);
        Route::post('/{id}/updateContributions', ['as' => 'updateContributions.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@updateContributions']);


        Route::get('/{id}/period', ['as' => 'period_init.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@initPeriod']);
        Route::get('/{id}/period/create', ['as' => 'period_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@createPeriod']);
        Route::get('/{id}/period/view', ['as' => 'period_view.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@viewPeriod']);
        Route::get('/{id}/period/continue', ['as' => 'period_continue.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@continuePeriod']);
        Route::post('/{id}/period/store', ['as' => 'period_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@storePeriod']);
        

        Route::get('/{id}/academicCycle', ['as' => 'academicCycle_init.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@initAcademicCycle']);
        Route::get('/{id}/academicCycle/create', ['as' => 'academicCycle_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@createAcademicCycle']);
        Route::get('/{id}/academicCycle/view', ['as' => 'academicCycle_view.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@viewAcademicCycle']);
        Route::post('/{id}/academicCycle/store', ['as' => 'academicCycle_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@storeAcademicCycle']);
    

        Route::get('/{id}/profesor', ['as' => 'profesor_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@profesor_index']);
        Route::get('/{id}/profesor/create', ['as' => 'profesor_create.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@profesor_create']);        
        Route::post('/{id}/profesor/store', ['as' => 'profesor_store.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@profesor_store']);

        //AJAX
        Route::get('/aspectosDelResultado', ['as' => 'aspectosDelResultado.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@aspectosDelResultado']);
        
        Route::get('/{id}/end2', ['as' => 'end2.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@end2']);
        Route::get('/{id}/end3', ['as' => 'end3.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@end3']);
        Route::get('/{id}/end4', ['as' => 'end4.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@end4']);

        //insturmentos de medicion de los cursos del ciclo:
        Route::get('/{id}/instrumentosDelCurso', ['as' => 'instrumentosDelCurso_index.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@instrumentosDelCurso_index']);
        Route::get('/{id}/instrumentosDelCurso/{idCurso}/edit', ['as' => 'instrumentosDelCurso_edit.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@instrumentosDelCurso_edit']);        
        Route::post('/{id}/instrumentosDelCurso/{idCurso}/update', ['as' => 'instrumentosDelCurso_update.flujoCoordinador', 'uses' => 'FlujoCoordinadorController@instrumentosDelCurso_update']);
    });


});