<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentControllerNew;
use App\Http\Controllers\HospitalizationReportController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\onlineController;
use App\Http\Controllers\choiseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\RendezvousController;

//home 
Route::get('/user', [HomeController::class, 'index'])->name('utilisateur.acceuil');


// Routes pour les patients
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');


// Routes pour les rendez-vous

// Routes pour les factures
Route::get('/factures', [FactureController::class, 'index'])->name('factures.index');
Route::get('/factures/create', [FactureController::class, 'create'])->name('factures.create');
Route::post('/factures', [FactureController::class, 'store'])->name('factures.store');
Route::get('/factures/{id}', [FactureController::class, 'show'])->name('factures.show');
Route::get('/factures/{id}/edit', [FactureController::class, 'edit'])->name('factures.edit');
Route::put('/factures/{id}', [FactureController::class, 'update'])->name('factures.update');
Route::delete('/factures/{id}', [FactureController::class, 'destroy'])->name('factures.destroy');



// routes/web.php


// routes/web.php

//Route::get('/factures', 'FactureController@index')->name('facture.index');

// routes/web.php

//Route::get('/rapports', 'RapportController@index')->name('rapport.index');
//Route::get('/rendezvous', 'App\Http\Controllers\RendezVousController@index')->name('rendezvous.index');
//Route::get('/rendezvous/create', 'App\Http\Controllers\RendezVousController@create')->name('rendezvous.create');





//rapport 

// Affiche la liste des rapports
Route::get('/hospitalization-reports', [HospitalizationReportController::class, 'index'])->name('hospitalization-reports.index');

// Affiche le formulaire pour créer un nouveau rapport

Route::get('/hospitalization-reports/create/{patient_id}', [HospitalizationReportController::class, 'create'])->name('hospitalization-reports.create');


// Enregistre un nouveau rapport dans la base de données
Route::post('/hospitalization-reports', [HospitalizationReportController::class, 'store'])->name('hospitalization-reports.store');

// Affiche les détails d'un rapport spécifique
Route::get('/hospitalization-reports/{hospitalizationReport}', [HospitalizationReportController::class, 'show'])->name('hospitalization-reports.show');

// Affiche le formulaire pour modifier un rapport existant
Route::get('/hospitalization-reports/{hospitalizationReport}/edit', [HospitalizationReportController::class, 'edit'])->name('hospitalization-reports.edit');

// Met à jour un rapport existant dans la base de données
Route::put('/hospitalization-reports/{hospitalizationReport}', [HospitalizationReportController::class, 'update'])->name('hospitalization-reports.update');

// Supprime un rapport existant de la base de données
Route::delete('/hospitalization-reports/{hospitalizationReport}', [HospitalizationReportController::class, 'destroy'])->name('hospitalization-reports.destroy');


Route::post('/submit-form', [FormController::class, 'submit'])->name('form.submit');
Route::get('/hospitalization-reports/{id}/pdf', [HospitalizationReportController::class, 'generatePdf'])->name('hospitalization-reports.generatePdf');

//auth 

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboardd', [AuthController::class, 'dashboardd'])->name('dashboardd');
Route::get('dashboarddd', [AuthController::class, 'dashboarddd'])->name('dashboarddd');
Route::get('/request', [RequestController::class, 'index'])->name('request.index');




//administrator

Route::get('/', [choiseController::class, 'choiseAdministrator'])->name('administrateur.choise');










//Appointment 



Route::get('/appointments', [AppointmentControllerNew::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentControllerNew::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentControllerNew::class, 'store'])->name('appointments.store');
Route::get('/appointments/{id}', [AppointmentControllerNew::class, 'show'])->name('appointments.show');
Route::get('/appointments/{id}/edit', [AppointmentControllerNew::class, 'edit'])->name('appointments.edit');
Route::put('/appointments/{id}', [AppointmentControllerNew::class, 'update'])->name('appointments.update');
Route::delete('/appointments/{id}', [AppointmentControllerNew::class, 'destroy'])->name('appointments.destroy');




Route::get('/demande', [OnlineController::class, 'showForm'])->name('online.rendForm');
Route::post('/demande', [OnlineController::class, 'submitDemande'])->name('online.submitDemande');
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');



//factures
Route::get('factures', [FactureController::class, 'index'])->name('factures.index');
Route::get('factures/pdf/{id}', [FactureController::class, 'generatePDF'])->name('factures.pdf');
 


Route::get('/secretaire', [SecretaireController::class, 'index'])->name('secretaires.index');


//chef medecin

Route::get('/medecins', [ChefController::class, 'index'])->name('medecins.index');
Route::get('/medecins/create', [ChefController::class, 'create'])->name('medecins.create');
Route::post('/medecins', [ChefController::class, 'store'])->name('medecins.store');
Route::get('/medecins/{id}', [ChefController::class, 'show'])->name('medecins.show');
Route::get('/medecins/{id}/edit', [ChefController::class, 'edit'])->name('medecins.edit');
Route::put('/medecins/{id}', [ChefController::class, 'update'])->name('medecins.update');
Route::delete('/medecins/{id}', [ChefController::class, 'destroy'])->name('medecins.destroy');
Route::get('/medecins/search', [ChefController::class, 'search'])->name('medecins.search');
Route::get('dashboardddd', [AuthController::class, 'dashboardddd'])->name('dashboardddd');



//rendez vous secrataire:

Route::get('/rendezsecretaire', [RendezvousController::class, 'index'])->name('rendezsecretaire.index');
Route::get('/rendezsecretaire/create', [RendezvousController::class, 'create'])->name('rendezsecretaire.create');
Route::post('/rendezsecretaire', [RendezvousController::class, 'store'])->name('rendezsecretaire.store');
Route::get('/rendezsecretaire/{id}', [RendezvousController::class, 'show'])->name('rendezsecretaire.show');
Route::get('/rendezsecretaire/{id}/edit', [RendezvousController::class, 'edit'])->name('rendezsecretaire.edit');
Route::put('/rendezsecretaire/{id}', [RendezvousController::class, 'update'])->name('rendezsecretaire.update');
Route::delete('/rendezsecretaire/{id}', [RendezvousController::class, 'destroy'])->name('rendezsecretaire.destroy');