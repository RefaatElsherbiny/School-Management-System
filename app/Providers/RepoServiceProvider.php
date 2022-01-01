<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(

            "App\Repository\TeacherRepositoryInterface",

            "App\Repository\TeacherRepository",

        );

        $this->app->bind(

            "App\Repository\StudentPromotionRepositoryInterface",
            "App\Repository\StudentPromotionRepository",

        );

        $this->app->bind(

            "App\Repository\StudentGraduateRepositoryInterface",
            "App\Repository\StudentGraduateRepository",

        );

        $this->app->bind(

            "App\Repository\FessRepositoryInterface",
            "App\Repository\FessRepository",

        );

        $this->app->bind(

            "App\Repository\Fess_invoicesRepositoryInterface",
            "App\Repository\Fess_invoicesRepository",

        );

        $this->app->bind(

            "App\Repository\Receipt_studentsRepositoryInterface",
            "App\Repository\Receipt_studentsRepository",

        );

        $this->app->bind(

            "App\Repository\Processing_FessRepositoryInterface",
            "App\Repository\Processing_FessRepository",

        );

        $this->app->bind(

            "App\Repository\Payments_FeesRepositoryInterface",
            "App\Repository\Payments_FessRepository",

        );

        $this->app->bind(

            "App\Repository\AttendancesRepositoryInterface",
            "App\Repository\AttendancesRepository",

        );

        $this->app->bind(

            "App\Repository\SubjectsRepositoryInterface",
            "App\Repository\SubjectsRepository",

        );

        $this->app->bind(

            "App\Repository\QuizzesRepositoryInterface",
            "App\Repository\QuizzesRepository",

        );
        $this->app->bind(

            "App\Repository\QuestionsRepositoryInterface",
            "App\Repository\QuestionsRepository",

        );

        $this->app->bind(

            "App\Repository\LibraryRepositoryInterface",
            "App\Repository\LibraryRepository",

        );



    }




    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
