<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $guest = Role::create(['name' => 'guest']);

        //admin controller
        $adminList = Permission::create(['name' => 'adminList']);
        $adminCreate = Permission::create(['name' => 'adminCreate']);
        $adminEdit = Permission::create(['name' => 'adminEdit']);
        $adminUpdate = Permission::create(['name' => 'adminUpdate']);
        $adminDelete = Permission::create(['name' => 'adminDelete']);
        $adminStatus = Permission::create(['name' => 'adminStatus']);
        $adminChangePassword = Permission::create(['name' => 'adminChangePassword']);
        
        //subject controller
        $getYears = Permission::create(['name' => 'getYears']);
        $getSubjects = Permission::create(['name' => 'getSubjects']);
        $getSubjectById = Permission::create(['name' => 'getSubjectById']);
        $storeSubject = Permission::create(['name' => 'storeSubject']);
        $updateSubjectById = Permission::create(['name' => 'updateSubjectById']);
        $deleteSubjectById = Permission::create(['name' => 'deleteSubjectById']);
        $toggleStatus = Permission::create(['name' => 'toggleStatus']);
        $attachSubjectToYear = Permission::create(['name' => 'attachSubjectToYear']);
        $storeTeacherSubject = Permission::create(['name' => 'storeTeacherSubject']);

        //assignment controller
        $storeAssignment = Permission::create(['name' => 'storeAssignment']);
        $getAssignments = Permission::create(['name' => 'getAssignments']);
        $getTeachers = Permission::create(['name' => 'getTeachers']);
        $getStudents = Permission::create(['name' => 'getStudents']);
        $getTeacherYearSubjects = Permission::create(['name' => 'getTeacherYearSubjects']);
        $getAssignmentById = Permission::create(['name' => 'getAssignmentById']);
        $storeAssignmentCategory = Permission::create(['name' => 'storeAssignmentCategory']);
        $getAssignmentCategories = Permission::create(['name' => 'getAssignmentCategories']);
        $getAssignmentCategoryById = Permission::create(['name' => 'getAssignmentCategoryById']);
        $deleteAssignmentFile = Permission::create(['name' => 'deleteAssignmentFile']);
        $storeSubmission = Permission::create(['name' => 'storeSubmission']);
        $updateSubmissionById = Permission::create(['name' => 'updateSubmissionById']);
        $getSubjectListByYearId = Permission::create(['name' => 'getSubjectListByYearId']);
        $getSubmissionList = Permission::create(['name' => 'getSubmissionList']);
        $getSubmissionById = Permission::create(['name' => 'getSubmissionById']);
        $getAssignmentsByTeacherId = Permission::create(['name' => 'getAssignmentsByTeacherId']);
        $getAssignmentsByStudentId = Permission::create(['name' => 'getAssignmentsByStudentId']);

        //event controller
        $getEvents = Permission::create(['name' => 'getEvents']);
        $getEventById = Permission::create(['name' => 'getEventById']);
        $storeEvent = Permission::create(['name' => 'storeEvent']);
        $deleteEventById = Permission::create(['name' => 'deleteEventById']);
        $updateOrCreateLab = Permission::create(['name' => 'updateOrCreateLab']);
        $getLabs = Permission::create(['name' => 'getLabs']);
        $getLabById = Permission::create(['name' => 'getLabById']);
        $deleteLabById = Permission::create(['name' => 'deleteLabById']);
        $updateOrCreateTimetable = Permission::create(['name' => 'updateOrCreateTimetable']);
        $getTimetablesByYearId = Permission::create(['name' => 'getTimetablesByYearId']);
        $getTimetables = Permission::create(['name' => 'getTimetables']);
        $getTimetableById = Permission::create(['name' => 'getTimetableById']);
        $deleteTimetableById = Permission::create(['name' => 'deleteTimetableById']);

        $admin->givePermissionTo(
            [
                $adminList,
                $adminCreate,
                $adminEdit,
                $adminUpdate,
                $adminDelete,
                $adminStatus,
                $adminChangePassword,
                $getYears,
                $getSubjects,
                $getSubjectById,
                $storeSubject,
                $updateSubjectById,
                $deleteSubjectById,
                $toggleStatus,
                $attachSubjectToYear,
                $storeTeacherSubject,


                $storeAssignment,
                $getAssignments,
                $getTeachers,
                $getStudents,
                $getTeacherYearSubjects,
                $getAssignmentById,
                $storeAssignmentCategory,
                $getAssignmentCategories,
                $getAssignmentCategoryById,
                $deleteAssignmentFile,
                $storeSubmission,
                $updateSubmissionById,
                $getSubjectListByYearId,
                $getSubmissionList,
                $getSubmissionById,

                $getEvents,
                $getEventById,
                $storeEvent,
                $deleteEventById,
                $updateOrCreateLab,
                $getLabs,
                $getLabById,
                $deleteLabById,
                $updateOrCreateTimetable,
                $getTimetablesByYearId,
                $getTimetables,
                $getTimetableById,
                $deleteTimetableById,
            ]
        );

        $teacher->givePermissionTo(
            [
                $adminList,
                $adminChangePassword,
                $getYears,
                $getSubjects,
                $getSubjectById,
                $storeSubject,
                $updateSubjectById,
                $deleteSubjectById,
                $toggleStatus,
                $attachSubjectToYear,
                $storeTeacherSubject,

                $storeAssignment,
                $getAssignments,
                $getTeachers,
                $getStudents,
                $getTeacherYearSubjects,
                $getAssignmentById,
                $storeAssignmentCategory,
                $getAssignmentCategories,
                $getAssignmentCategoryById,
                $deleteAssignmentFile,
                $storeSubmission,
                $updateSubmissionById,
                $getSubjectListByYearId,
                $getSubmissionList,
                $getSubmissionById,
                $getAssignmentsByTeacherId,
                $getAssignmentsByStudentId,

                $getEvents,
                $getEventById,
                $storeEvent,
                $deleteEventById,
                $updateOrCreateLab,
                $getLabs,
                $getLabById,
                $deleteLabById,
                $updateOrCreateTimetable,
                $getTimetablesByYearId,
                $getTimetables,
                $getTimetableById,
                $deleteTimetableById,
            ]
        );

        $student->givePermissionTo(
            [
                $adminChangePassword,
                $getYears,
                $getSubjects,
                $getAssignments,
                $getTeachers,
                $getStudents,
                $getTeacherYearSubjects,
                $getAssignmentById,
                $getAssignmentCategories,
                $getAssignmentCategoryById,
                $deleteAssignmentFile,
                $storeSubmission,
                $updateSubmissionById,
                $getSubjectListByYearId,
                $getSubmissionList,
                $getSubmissionById,
                $getAssignmentsByStudentId,

                $getEvents,
                $getLabs,
                $getTimetablesByYearId,
                $getTimetables,
            ]
        );

        $guest->givePermissionTo(
            [
                $getYears,
                $getSubjects,
            ]
        );
    }
}
