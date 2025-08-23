<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentAssignemtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            return [
                'data' => self::collection($this->resource->items()),
                'links' => [
                    'first' => $this->resource->url(1),
                    'last' => $this->resource->url($this->resource->lastPage()),
                    'prev' => $this->resource->previousPageUrl(),
                    'next' => $this->resource->nextPageUrl(),
                ],
                'meta' => [
                    'current_page' => $this->resource->currentPage(),
                    'last_page' => $this->resource->lastPage(),
                    'from' => $this->resource->firstItem(),
                    'to' => $this->resource->lastItem(),
                    'total' => $this->resource->total(),
                    'per_page' => $this->resource->perPage(),
                ],
            ];
        }
        return [
            "id" => $this->id,
            "assignment_category_id" => $this->assignment_category_id,
            "assignment_category" => $this->assignmentCategory->name,
            "teacher_id" => $this->teacher_id,
            "teacher" => $this->teacher->name,
            "title" => $this->title,
            "description" => $this->description,
            "assignment_date" => $this->assignment_date,
            "due_date" => $this->due_date,
            "given_marks" => $this->given_marks,
            "subject_id" => $this->subject_id,
            "subject" => $this->subject->name,
            "code" => $this->subject->code,
            "description" => $this->subject->description,
            "is_active" => $this->subject->is_active,
            "media" => $this->media->map(function($media) {
                return [
                    "id" => $media->id,
                    "name" => $media->name,
                    "file_name" => $media->file_name,
                    "mime_type" => $media->mime_type, 
                    "size" => $media->size,
                    "url" => $media->original_url,
                ];
            }),
            "submissions" => $this->submissions->map(function($submission) {
                return [
                    "id" => $submission->id,
                    "student_id" => $submission->student_id,
                    "assignment_id" => $submission->assignment_id,
                    "submitted_at" => $submission->submitted_at,
                    "total_mark" => $submission->total_mark,
                    "mark_in_percentage" => $submission->mark_in_percentage,
                    "graded_by" => $submission->graded_by,
                ];
            }),
        ];
    }
}
