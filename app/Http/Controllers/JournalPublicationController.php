<?php

namespace App\Http\Controllers;

use App\Http\Resources\JournalPublicationResource;
use App\Models\JournalPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalPublicationController extends Controller
{
    public function get_journal_Publication()
    {
        $data = JournalPublication::get();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_journal_Publication_own(Request $request)
    {
        $journal_data = JournalPublication::find($request['id']);
        if ($journal_data) {
            $journal_data->journal_name = $request['journal_name'];
            $journal_data->publication = $request['publication'];
            $journal_data->ugc_affiliation = $request['ugc_affiliation'];
            $journal_data->university_name = $request['university_name'];
            $journal_data->volume_page_number = $request['volume_page_number'];
            $journal_data->issn_number = $request['issn_number'];
            $journal_data->topic_name = $request['topic_name'];
            $journal_data->impact_factor = $request['impact_factor'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/journal_Publication/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $journal_data->file_name = $files->getClientOriginalName();
            }

            $journal_data->update();
        } else {
            $journal = new JournalPublication();
            $journal->staff_id = $request->user()->id;
            $journal->journal_name = $request['journal_name'];
            $journal->publication = $request['publication'];
            $journal->ugc_affiliation = $request['ugc_affiliation'];
            $journal->university_name = $request['university_name'];
            $journal->volume_page_number = $request['volume_page_number'];
            $journal->issn_number = $request['issn_number'];
            $journal->topic_name = $request['topic_name'];
            $journal->impact_factor = $request['impact_factor'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/journal_Publication/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $journal->file_name = $files->getClientOriginalName();
            }

            $journal->save();
        }

        $journals = JournalPublication::whereStaffId($request->user()->id)->get();

        return response()->json(['success' => 1, 'data' => JournalPublicationResource::collection($journals)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_journal_Publication_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/journal_Publication/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
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
            $journal->file_name = $list['file_name'];
            $journal->impact_factor = $list['impact_factor'];
            $journal->save();
        }

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_journal_Publication(Request $request)
    {
        foreach ($request['journal_publication_array'] as $list) {
            $journal = JournalPublication::find($list['id']);
            if ($journal) {
                $journal->staff_id = $list['staff_id'];
                $journal->journal_name = $list['journal_name'];
                $journal->publication = $list['publication'];
                $journal->ugc_affiliation = $list['ugc_affiliation'];
                $journal->university_name = $list['university_name'];
                $journal->volume_page_number = $list['volume_page_number'];
                $journal->issn_number = $list['issn_number'];
                $journal->topic_name = $list['topic_name'];
                $journal->impact_factor = $list['impact_factor'];
                $journal->file_name = $list['file_name'] ?? $journal->file_name;
                $journal->update();
            } else {
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
                $journal->file_name = $list['file_name'];
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
        $journals = JournalPublication::whereStaffId(Auth::id())->get();

        return response()->json(['success' => 1, 'data' => JournalPublicationResource::collection($data), 'journals' => JournalPublicationResource::collection($journals)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function search_journal_publication($staff_id = null)
    {

        if ($staff_id != "null") {
            $data = JournalPublication::whereStaffId($staff_id)->get();
        } else {
            $data = JournalPublication::get();
        }
        return response()->json(['success' => 1, 'data' => JournalPublicationResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }
}
