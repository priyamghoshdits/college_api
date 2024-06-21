<?php

namespace App\Http\Controllers;

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
        $journal = new JournalPublication();
        $journal->staff_id = $request->staff_id;
        $journal->name = $request->name;
        $journal->publication = $request->publication;
        $journal->ugc_affiliation = $request->ugc_affiliation;
        $journal->volume_page_number = $request->volume_page_number;
        $journal->issn_number = $request->issn_number;
        $journal->impact_factor = $request->impact_factor;
        $journal->save();

        return response()->json(['success' => 1, 'data' => $journal], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_journal_Publication(Request $request)
    {
        $journal = JournalPublication::find($request->id);
        $journal->staff_id = $request->staff_id;
        $journal->name = $request->name;
        $journal->publication = $request->publication;
        $journal->ugc_affiliation = $request->ugc_affiliation;
        $journal->volume_page_number = $request->volume_page_number;
        $journal->issn_number = $request->issn_number;
        $journal->impact_factor = $request->impact_factor;
        $journal->update();

        return response()->json(['success' => 1, 'data' => $journal], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_journal_Publication($id)
    {
        $data = JournalPublication::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }
}
