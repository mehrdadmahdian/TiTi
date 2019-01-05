<?PHP

use Illuminate\Support\Facades\Route;

function setActive($route, $class = 'active', $classElese = '')
{
    $routeName = Route::currentRouteName();
    
    if (!is_array($route) and $route != '') {
        return routeIsInCurrent($route,$routeName ) ? $class : $classElese;
    } elseif (is_array($route) and !empty($route)) {
        foreach ($route as $item) {
            if (routeIsInCurrent($route,$routeName )) {
                return $class;
            }
        }
        return $classElese;
    }
}

function routeIsInCurrent($route, $current)
{
    //$prefix = config('cruds.admin_prefix', 'backend');
    return strpos($current, $route) !== false;
}

function madSafety($string)
{
    $string = e(stripslashes(strip_tags($string)));
    return $string;
}

function slugify($string, $separator = '-', $limit = 8)
{
    $string = strtolower($string);
    $string = str_replace('‌', ' ', $string);
    $string = \Illuminate\Support\Str::words($string, $limit, '');
    $string = mb_ereg_replace('([^آ-ی۰-۹a-z0-9]|-)+', $separator, $string);
    $string = strtolower($string);
    return trim($string, $separator);
}

function formatMin($min)
{
    $hours = floor($min / 60);
    $minutes = ($min % 60);
    return sprintf('%02d:%02d', $hours, $minutes);
}

function addFormBtn(&$class, $backRoute)
{
    $class
        ->add('back', 'static', [
            'label' => false,
            'tag' => 'a',
            'attr' => [
                'class' => 'return-btn btn btn-default pull-right',
                'href' => $backRoute
            ],
            'value' => '<i class="fa fa-arrow-right"></i> ' . 'بازگشت'
        ])
        ->add('<i class="fa fa-check"></i>ذخیره', 'submit', ['attr' => ['class' => 'btn btn-primary dim']]);
}

function GetFormFields($form)
{
    $fields = [];
    foreach ($form->getFields() as $field) {
        if ($field->getOption('filter')) {
            $filterID = $field->getName();

            if ($field->getOption('filter-id', false))
                $filterID = $field->getOption('filter-id');

            $fields[] = $filterID;
        }
    }

    return $fields;
}

if (!function_exists('trans_fb')) {
    /**
     * Translate the given message with a fallback string if none exists.
     *
     * @param  string $id
     * @param  string $fallback
     * @param  array $parameters
     * @param  string $domain
     * @param  string $locale
     * @return \Symfony\Component\Translation\TranslatorInterface|string
     */
    function trans_fb($id, $fallback, $parameters = [], $domain = 'messages', $locale = null)
    {
        return ($id === ($translation = trans($id, $parameters, $domain, $locale))) ? $fallback : $translation;
    }

}