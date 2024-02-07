<?php

namespace App\Enums;

enum RoleEnum: string
{
  case Subscriber = 'subscriber';
  case Contributor = 'contributor';
  case Author = 'author';
  case Editor = 'editor';
  case Administrator = 'administrator';

  public function label(): string
  {
    return match ($this) {
      self::Subscriber => '購読者',
      self::Contributor => '寄稿者',
      self::Author => '投稿者',
      self::Editor => '編集者',
      self::Administrator => '管理者',
    };
  }
}
