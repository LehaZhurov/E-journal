<?php
namespace App\Queries\RecordBook;
use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;
class GetAttesationGroupQuery{
        
    public static function find(int $groupId) : Collection | array
    {
        $attestation = Group::find($groupId)
        ->join('group_subject', 'groups.id', '=', 'group_subject.group_id')
        ->join('subjects', 'group_subject.subject_id', '=', 'subjects.id')
        ->join('record_books','subjects.id', '=', 'record_books.subject_id')
        ->join('users','users.id', '=', 'record_books.student_id')
        ->join('type_attestations','record_books.type_attestation_id', '=', 'type_attestations.id')
        ->select(
            'groups.name as group_name',
            'users.name as user_name',
            'record_books.value as value',
            'record_books.id as attestation_id',
            'subjects.name  as subject_name',        
            'type_attestations.name as type_attestation_name',
        );
        return $attestation->get();
    }    
        
}