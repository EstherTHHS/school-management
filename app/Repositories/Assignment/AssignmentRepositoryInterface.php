<?php

namespace App\Repositories\Assignment;

use Illuminate\Http\Request;


interface AssignmentRepositoryInterface
{
    public function getTeachers();
    public function getStudents();
    public function getYearSubjects(Request $request);
    public function getAssignments();
    public function storeAssignment($data);
    public function getAssignmentById($id);
    public function storeAssignmentCategory($data);
    public function getAssignmentCategories();
    public function deleteAssignmentFile($id);
    public function storeSubmission($data);
    public function updateSubmissionById($id, $data);
    public function getSubjectListByYearId($yearId);
    public function getSubmissionList(Request $request);
}
