<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentAssignemtResource;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Resources\StudentAssignmentCollection;
use App\Repositories\Assignment\AssignmentRepositoryInterface;
use Illuminate\Routing\Controllers\Middleware;

class AssignmentController extends Controller
{
    private AssignmentRepositoryInterface $assignmentRepository;
    public function __construct(AssignmentRepositoryInterface $assignmentRepository)
    {
        $this->assignmentRepository = $assignmentRepository;
    }
    public function storeAssignment(Request $request)
    {
        $assignment = $this->assignmentRepository->storeAssignment($request->all());
        ResponseData($assignment);
    }

    public function getAssignments()
    {
        $assignments = $this->assignmentRepository->getAssignments();
        ResponseData($assignments);
    }

    public function getTeachers()
    {
        $teachers = $this->assignmentRepository->getTeachers();
        ResponseData($teachers);
    }

    public function getStudents()
    {
        $students = $this->assignmentRepository->getStudents();
        ResponseData($students);
    }

    public function getTeacherYearSubjects($teacher_id)
    {
        $yearSubjects = $this->assignmentRepository->getTeacherYearSubjects($teacher_id);
        ResponseData($yearSubjects);
    }

    public function getAssignmentById($id)
    {
        $assignment = $this->assignmentRepository->getAssignmentById($id);
        ResponseData($assignment);
    }

    public function storeAssignmentCategory(Request $request)
    {
        $assignmentCategory = $this->assignmentRepository->storeAssignmentCategory($request->all());
        ResponseData($assignmentCategory);
    }

    public function getAssignmentCategories()
    {
        $assignmentCategories = $this->assignmentRepository->getAssignmentCategories();
        ResponseData($assignmentCategories);
    }

    public function getAssignmentCategoryById($id)
    {
        $assignmentCategory = $this->assignmentRepository->getAssignmentCategoryById($id);
        ResponseData($assignmentCategory);
    }

    public function deleteAssignmentFile($id)
    {
        $assignment = $this->assignmentRepository->deleteAssignmentFile($id);
        ResponseData($assignment);
    }

    public function storeSubmission(Request $request)
    {
        $submission = $this->assignmentRepository->storeSubmission($request->all());
        ResponseData($submission);
    }
    public function updateSubmissionById($id, Request $request)
    {
        $submission = $this->assignmentRepository->updateSubmissionById($id, $request->all());
        ResponseData($submission);
    }
    public function getSubjectListByYearId($yearId)
    {
        $subjectList = $this->assignmentRepository->getSubjectListByYearId($yearId);
        ResponseData($subjectList);
    }
    public function getSubmissionList(Request $request)
    {
        $submissionList = $this->assignmentRepository->getSubmissionList($request);
        ResponseData($submissionList);
    }

    public function getSubmissionById($id)
    {
        $submission = $this->assignmentRepository->getSubmissionById($id);
        ResponseData($submission);
    }

    public function getAssignmentsByTeacherId()
    {
        $assignments = $this->assignmentRepository->getAssignmentsByTeacherId();
        ResponseData($assignments);
    }

    public function getAssignmentsByStudentId()
    {
        $assignments = $this->assignmentRepository->getAssignmentsByStudentId();
        return StudentAssignemtResource::collection($assignments);
    }
}
