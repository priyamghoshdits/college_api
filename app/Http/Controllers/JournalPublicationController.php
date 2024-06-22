<?php

namespace App\Http\Controllers;

use App\Http\Resources\JournalPublicationResource;
use App\Models\JournalPublication;
use Illuminate\Http\Request;

class JournalPublicationController extends Controller
{
    public function get_journal_Publication()
    {
        $data = JournalPublication::get();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_journal_Publication(Request $request)
    {
        foreach ($request['journal_publication_array'] as $list) {
            $journal = new JournalPublication();
            $journal->staff_id = $list['staff_id'];
            $journal->journal_name = $list['journal_name'];
            $journal->publication = $list['publication'];
            $journal->ugc_affiliation = $list['ugc_affiliation'];
            $journal->university_name = $list['university_name'];
            $journal->volume_page_number = $list['volume_page_number'];
            $journal->issn_number = $list['issn_number'];
            $journal->topic_name = $list['topic_name'];
            $journal->impact_factor = $list['impact_factor'];
            $journal->save();
        }


        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_journal_Publication(Request $request)
    {
        foreach ($request['journal_publication_array'] as $list) {
            $journal = JournalPublication::find($list['id']);
            if($journal){
                $journal->staff_id = $list['staff_id'];
                $journal->journal_name = $list['journal_name'];
                $journal->publication = $list['publication'];
                $journal->ugc_affiliation = $list['ugc_affiliation'];
                $journal->university_name = $list['university_name'];
                $journal->volume_page_number = $list['volume_page_number'];
                $journal->issn_number = $list['issn_number'];
                $journal->topic_name = $list['topic_name'];
                $journal->impact_factor = $list['impact_factor'];
                $journal->update();
            }else{
                $journal = new JournalPublication();
                $journal->staff_id = $list['staff_id'];
                $journal->journal_name = $list['journal_name'];
                $journal->publication = $list['publication'];
                $journal->ugc_affiliation = $list['ugc_affiliation'];
                $journal->university_name = $list['university_name'];
                $journal->volume_page_number = $list['volume_page_number'];
                $journal->issn_number = $list['issn_number'];
                $journal->topic_name = $list['topic_name'];
                $journal->impact_factor = $list['impact_factor'];
                $journal->save();
            }
        }

        return response()->json(['success' => 1, 'data' => $journal], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_journal_Publication($id)
    {
        $data = JournalPublication::find($id);
        $data->delete();

        $data = JournalPublication::get();

        return response()->json(['success' => 1, 'data' => JournalPublicationResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function search_journal_publication($staff_id = null){

        if($staff_id != "null"){
            $data = JournalPublication::whereStaffId($staff_id)->get();
        }else{
            $data = JournalPublication::get();
        }
        return response()->json(['success' => 1, 'data' =>JournalPublicationResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

}
