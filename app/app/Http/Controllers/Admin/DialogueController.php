<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dialogue\SearchRequest;
use App\Http\Requests\Dialogue\StoreRequest;
use App\Http\Requests\Dialogue\UpdateRequest;
use App\Services\DialogueService;
use App\Services\MemberService;
use App\Traits\SearchRequestTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DialogueController extends Controller
{

  use SearchRequestTrait;

  public function __construct(
    private DialogueService $dialogueService,
    private MemberService $memberService
  ) {
  }

  public function index(SearchRequest $request): View
  {
    $request['sort'] = 'id';
    $request['sort_direction'] = 'asc';
    $dialogues = $this->dialogueService->findPaginate($request);
    $members = $this->memberService->findAll($this->activeUnitMemberRequest());

    $members->prepend(new Collection([
      'id' => 'null',
      'name_with_unit' => 'everyone',
      'bg_color' => '#818181',
      'color' => '#ffffff'
    ]));

    return view('admin.dialogues.index', [
      'dialogues' => $dialogues,
      'filter' => $request->collect('filter'),
      'memberOptions' => \FormUtil::createSelectOptions($members, 'id', 'name_with_unit', false, 'bg_color', 'color'),
    ]);
  }

  public function search(Request $request): RedirectResponse
  {
    $filter = array_filter(
      $request->collect('filter')->toArray(),
      function ($value) {
        return !(is_null($value) || $value === "");
      }
    );

    return redirect()->route('admin.dialogues.index', $filter ? ['filter' => $filter] : []);
  }

  public function create(): View
  {
    $members = $this->memberService->findAll($this->activeUnitMemberRequest());

    return view('admin.dialogues.create', [
      'memberOptions' => \FormUtil::createSelectOptions($members, 'id', 'name_with_unit'),
    ]);
  }

  public function store(StoreRequest $request): RedirectResponse
  {
    $result  = $this->dialogueService->store($request);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.store.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.store.failed');
    }

    return redirect()->route('admin.dialogues.index')->with($messageKey, $flashMessage);
  }

  public function view(int $id): View
  {
    $dialogue = $this->dialogueService->findOne($id);

    return view('admin.dialogues.view', [
      'dialogue' => $dialogue,
    ]);
  }

  public function display(int $id): StreamedResponse
  {
    $dialogue = $this->dialogueService->findOne($id);

    return \StorageUtil::download($dialogue->file);
  }

  public function edit(int $id): View
  {
    $dialogue = $this->dialogueService->findOne($id);

    $members = $this->memberService->findAll($this->activeUnitMemberRequest());

    return view('admin.dialogues.edit', [
      'dialogue' => $dialogue,
      'memberOptions' => \FormUtil::createSelectOptions($members, 'id', 'name_with_unit'),
    ]);
  }

  public function update(int $id, UpdateRequest $request): RedirectResponse
  {
    $result = $this->dialogueService->update($id, $request);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.update.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.update.failed');
    }

    return redirect()->route('admin.dialogues.view', ['id' => $id])->with($messageKey, $flashMessage);
  }

  public function destroy(int $id,): RedirectResponse
  {
    $result = $this->dialogueService->destroy($id);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.destroy.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.destroy.failed');
    }

    return redirect()->route('admin.dialogues.index')->with($messageKey, $flashMessage);
  }
}
