<?php

namespace App\Services\Admin;

use App\Constants\AppConstants;
use App\Exceptions\CustomException;
use App\Http\Resources\TipResource;
use App\Models\Tip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ManageTipService
{
    /**
     * @return Application|Factory|View
     */
    public function viewAllTips()
    {
        $tips = Tip::orderBy('created_at','desc')->paginate(AppConstants::$pagination);

        return view('tips.index',compact('tips'));
    }

    /**
     * @param $tip_request
     * @return RedirectResponse
     */
    public function createNewTip($tip_request)
    {
        $tip_request->validate([
            'team_a' => 'required|string',
            'team_b'  => 'required|string',
            'country_league'  => 'required|string',
            'correct_tip' => 'required|string',
            'correct_odd' => 'required',
            'match_time' => 'required'
        ]);

        Tip::create([
            'team_a' => $tip_request['team_a'],
            'team_b'  => $tip_request['team_b'],
            'country_league'  => $tip_request['country_league'],
            'correct_tip' => $tip_request['correct_tip'],
            'correct_odd' => $tip_request['correct_odd'],
            'match_time' => $tip_request['match_time'],
            'is_vip' => $tip_request->has('is_vip') ? 1 : 0
        ]);

        return redirect()->route('tip.all')->with('success',"Tip created successfully");
    }

    public function showEditForm($tip_id)
    {
        $tip = Tip::findOrFail($tip_id);
        return view('tips.edit')->with('tip', $tip);
    }

    /**
     * @param $tip_request
     * @return RedirectResponse
     */
    public function updateExistingTip($tip_request)
    {
        $existing_tip = Tip::findOrFail($tip_request->tip_id);
        $existing_tip->team_a = $tip_request['team_a'];
        $existing_tip->team_b = $tip_request['team_b'];
        $existing_tip->country_league = $tip_request['country_league'];
        $existing_tip->correct_tip = $tip_request['correct_tip'];
        $existing_tip->correct_odd = $tip_request['correct_odd'];
        if ($tip_request->filled('match_time'))
            $existing_tip->match_time = $tip_request['match_time'];
        if ($tip_request->filled('other_score'))
            $existing_tip->other_score = $tip_request['other_score'];
        if ($tip_request->has('is_vip'))
            if ($existing_tip->is_vip == 1)
                $existing_tip->is_vip = 0;
            else
                $existing_tip->is_vip = 1;

        $existing_tip->update();

        return redirect()->route('tip.all')->with('success',"Tip updated successfully");
    }

    /**
     * @param $tip_id
     * @return RedirectResponse
     */
    public function deleteTip($tip_id)
    {
        $existing_tip = Tip::findOrFail($tip_id);
        $existing_tip->delete();

        return redirect()->route('tip.all')->with('success',"Tip deleted successfully");
    }

}
