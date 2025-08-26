<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentAssignemtResource;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Resources\StudentAssignmentCollection;
use App\Repositories\Assignment\AssignmentRepositoryInterface;
use Illuminate\Routing\Controllers\Middleware;

class AssignmentController extends Controller implements HasMiddleware
{
    private AssignmentRepositoryInterface $assignmentRepository;
    public function __construct(AssignmentRepositoryInterface $assignmentRepository)
    {
        $this->assignmentRepository = $assignmentRepository;
    }
    public static function middleware(): array
    {
        return [
            new Middleware('permission:storeAssignment', only: ['storeAssignmentgetYears']),
            new Middleware('permission:getAssignments', only: ['getAssignments']),
            new Middleware('permission:getTeachers', only: ['getTeachers']),
            new Middleware('permission:getStudents', only: ['getStudents']),
            new Middleware('permission:getTeacherYearSubjects', only: ['getTeacherYearSubjects']),
            new Middleware('permission:getAssignmentById', only: ['getAssignmentById']),
            new Middleware('permission:storeAssignmentCategory', only: ['storeAssignmentCategory']),
            new Middleware('permission:getAssignmentCategories', only: ['getAssignmentCategories']),
            new Middleware('permission:getAssignmentCategoryById', only: ['getAssignmentCategoryById']),
            new Middleware('permission:deleteAssignmentFile', only: ['deleteAssignmentFile']),
            new Middleware('permission:storeSubmission', only: ['storeSubmission']),
            new Middleware('permission:updateSubmissionById', only: ['updateSubmissionById']),
            new Middleware('permission:getSubjectListByYearId', only: ['getSubjectListByYearId']),
            new Middleware('permission:getSubmissionList', only: ['getSubmissionList']),
            new Middleware('permission:getSubmissionById', only: ['getSubmissionById']),
            new Middleware('permission:getAssignmentsByTeacherId', only: ['getAssignmentsByTeacherId']),
            new Middleware('permission:getAssignmentsByStudentId', only: ['getAssignmentsByStudentId']),
        ];
    }
    public function storeAssignment(Request $request){
        $assignment = $this->assignmentRepository->storeAssignment($request->all());
        ResponseData($assignment);
    }

    public function getAssignments(){
        $assignments = $this->assignmentRepository->getAssignments();
        ResponseData($assignments);
    }

    public function getTeachers(){
        $teachers = $this->assignmentRepository->getTeachers();
        ResponseData($teachers);
    }

    public function getStudents(){
        $students = $this->assignmentRepository->getStudents();
        ResponseData($students);
    }

    public function getTeacherYearSubjects($teacher_id){
        $yearSubjects = $this->assignmentRepository->getTeacherYearSubjects($teacher_id);
        ResponseData($yearSubjects);
    }

    public function getAssignmentById($id){
        $assignment = $this->assignmentRepository->getAssignmentById($id);
        ResponseData($assignment);
    }

    public function storeAssignmentCategory(Request $request){
        $assignmentCategory = $this->assignmentRepository->storeAssignmentCategory($request->all());
        ResponseData($assignmentCategory);
    }   

    public function getAssignmentCategories(){
        $assignmentCategories = $this->assignmentRepository->getAssignmentCategories();
        ResponseData($assignmentCategories);
    }

    public function getAssignmentCategoryById($id){
        $assignmentCategory = $this->assignmentRepository->getAssignmentCategoryById($id);
        ResponseData($assignmentCategory);
    }

    public function deleteAssignmentFile($id){
        $assignment = $this->assignmentRepository->deleteAssignmentFile($id);
        ResponseData($assignment);
    }

    public function storeSubmission(Request $request){
        $submission = $this->assignmentRepository->storeSubmission($request->all());
        ResponseData($submission);
    }
    public function updateSubmissionById($id, Request $request){
        $submission = $this->assignmentRepository->updateSubmissionById($id, $request->all());
        ResponseData($submission);
    }
    public function getSubjectListByYearId($yearId){
        $subjectList = $this->assignmentRepository->getSubjectListByYearId($yearId);
        ResponseData($subjectList);
    }
    public function getSubmissionList(Request $request){
        $submissionList = $this->assignmentRepository->getSubmissionList($request);
        ResponseData($submissionList);
    }

    public function getSubmissionById($id){
        $submission = $this->assignmentRepository->getSubmissionById($id);
        ResponseData($submission);
    }

    public function getAssignmentsByTeacherId(){
        $assignments = $this->assignmentRepository->getAssignmentsByTeacherId();
        ResponseData($assignments);
    }

    public function getAssignmentsByStudentId(){
        $assignments = $this->assignmentRepository->getAssignmentsByStudentId();
        return StudentAssignemtResource::collection($assignments);
    }
}
