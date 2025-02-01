<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\ReportsFileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ReportFilesService
{

    public $path;
    public function UploadFilesAndCreateRecord(UploadedFile $file, $report_id, $sent_by, $sent_to, $user_id, $section): ReportsFileUpload // file -argument for dependency injection
    {
        // Validation rules for the file property
        $validator = Validator::make(
            ['file' => $file], // The input data to validate
            [
                'file' => [
                    'file',
                    'max:6120', // Max 7MB
                    'mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,txt',
                    'mimetypes:image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/plain'

                ]
            ]
        );

        // Check if validation fails and throw an exception
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // if no errors then upload files and return the fuction to create a record in database
        $this->path = $file->store('report-files', 'public'); // default storage folder for all our Report Files

        return $this->createFileRecord($file, $report_id,  $sent_by, $sent_to, $user_id, $section);
    }


    private function createFileRecord(
        UploadedFile $file,
        $report_id,
        $sent_by,
        $sent_to,
        $user_id,
        $section,
    ): ReportsFileUpload {
        return ReportsFileUpload::create([
            'file_name' => $file->getClientOriginalName(), // real file name
            'path' => $this->path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'random_name' => $file->hashName(), //random system generated name
            'sent_by' => $sent_by,
            'report_id' => $report_id,
            'sent_to' => $sent_to,
            'user_id' => $user_id,
            'section' => Str::upper($section),
            'date' => Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'), // create a class later to accomodate other timezones
        ]);
    }
}
