<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Service\BarService;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'di')]
class DiController extends Controller
{
    public function set()
    {
        di()->set('foo', make(BarService::class));
        $bar = di()->get('foo');

        di()->set('foo', make(BarService::class));
        $bar2 = di()->get('foo');

        return $this->response->success([$bar->id, $bar2->id]);
    }
}
