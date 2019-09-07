<?php
Route::prefix('')->group(function () {
    Route::Get('/login','\App\Modules\Login\LoginController@index')->name('login');
    Route::Post('/login','\App\Modules\Login\LoginController@action');
    Route::Get('/logout','\App\Modules\Login\LoginController@logout');
    Route::group(['middleware' => ['auth']], function ()
{
    Route::Get('/','\App\Modules\Home\HomeController@index');
    Route::get('event/add','\App\Modules\Events\EventsController@createEvent');
    Route::post('event/add','\App\Modules\Events\EventsController@store');
    Route::get('event','\App\Modules\Events\EventsController@calender');
    Route::resource('profressor', '\App\Modules\Profressor\ProfressorController');
    Route::resource('right','\App\Modules\Right\RightController');
    Route::resource('position','\App\Modules\Position\PositionController');
    Route::resource('qualification','\App\Modules\Qualification\QualificationController');
    Route::resource('study','\App\Modules\Study\StudyController');
    Route::resource('soure','\App\Modules\Soure\SoureController');
    Route::resource('reports','\App\Modules\Reports\ReportsController');
    Route::resource('portfolio','\App\Modules\Portfolio\PortfolioController');
    Route::resource('type','\App\Modules\Academictype\AcademictypeController');
    Route::resource('train','\App\Modules\Train\TrainController');
    Route::resource('typesoure','\App\Modules\Typesoure\TypesoureController'); 
    Route::resource('branchs','\App\Modules\Branchs\BranchsController');
    Route::resource('groups','\App\Modules\Groups\GroupsController');
    Route::resource('publishs','\App\Modules\Publishs\PublishsController'); 
    Route::resource('institutions','\App\Modules\Institutions\InstitutionsController'); 
    Route::resource('education','\App\Modules\Education\EducationController');
    Route::resource('degrees','\App\Modules\Degrees\DegreesController'); 
    Route::resource('follow','\App\Modules\Follow\FollowController'); 
    Route::resource('requestlog','\App\Modules\Requestlog\RequestlogController'); 
    Route::resource('subjectss','\App\Modules\Subjectss\SubjectssController'); 
    Route::resource('positiontypes','\App\Modules\Positiontypes\PositiontypesController'); 
    Route::resource('request','\App\Modules\Request\RequestController'); 
    Route::resource('followtrain','\App\Modules\Followtrain\FollowtrainController'); 
    Route::resource('sides','\App\Modules\Sides\SidesController'); 
    Route::resource('document','\App\Modules\Document\DocumentController'); 
    Route::resource('comment','\App\Modules\Comment\CommentController'); 
    Route::resource('commentplan','\App\Modules\Commentplan\CommentplanController'); 
    Route::resource('followtrainchife','\App\Modules\Followtrain\FollowtrainchifeController'); 
    Route::resource('followchife','\App\Modules\Follow\FollowchifeController'); 
    Route::resource('term','\App\Modules\Term\TermController'); 
    Route::resource('program','\App\Modules\Program\ProgramController'); 
    Route::resource('teacherprogram','\App\Modules\Teacherprogram\TeacherprogramController');
    Route::resource('assignment','\App\Modules\Assignment\AssignmentController');
    Route::resource('worktype','\App\Modules\Worktype\WorktypeController');
    Route::post('/job','\App\Modules\Assignment\JobController@jobshow');

   /* Route::get('laravel-version', function() {
        $laravel = app();
        return "Your Laravel version is ".$laravel::VERSION;
   });
    /*
    Route::GET('/home/study','\App\Modules\Study\StudyController@index');
    Route::GET('/home/soure','\App\Modules\Soure\SoureController@soure');
    Route::GET('/home/academic','\App\Modules\Academic\AcademicController@listacademic');
    Route::GET('/academic/addacademic','\App\Modules\Academic\AcademicController@formacademic');
    Route::GET('/train','\App\Modules\Train\TrainController@index');
    Route::GET('/conclude','\App\Modules\Train\TrainController@conclude');
    Route::GET('/education','\App\Modules\Education\EducationController@index');
    Route::GET('/finish','\App\Modules\Education\EducationController@finish');
    Route::GET('/profressor','\App\Modules\Profressor\ProfressorController@index');
    Route::GET('/profressor/edit/{tea_id}','\App\Modules\Profressor\ProfressorController@editform');
    Route::POST('/profressor/edit/{tea_id}','\App\Modules\Profressor\ProfressorController@action');
    Route::GET('/profressor/delete/{tea_id}','\App\Modules\Profressor\ProfressorController@action_delete');
    Route::GET('/profressor/add','\App\Modules\Profressor\ProfressorController@addform');
    Route::POST('/profressor/add','\App\Modules\Profressor\ProfressorController@addaction');
    Route::Get('/responsible','\App\Modules\Responsible\ResponsibleController@index');
    Route::Get('/chief','\App\Modules\Chief\ChiefController@index');
    Route::Get('/right','\App\Modules\Right\RightController@index');
    Route::Get('/right/add','\App\Modules\Right\RightController@addform');
    Route::POST('/right/add','\App\Modules\Right\RightController@addaction');
    */
});
});