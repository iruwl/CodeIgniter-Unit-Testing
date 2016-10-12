<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/**
 * Unit Testing Controller
 *
 * @author Khairul Anwar <iruwl.github.io>
 * @date   2016-10-12
 */

class Unit_test extends CI_Controller
{
    /**
     * Define test and expected result
     * @return array List of result tests
     */
    private function run_tests()
    {
        // detail
        $test     = 1 + 1;
        $expected = 2;
        $name     = '1 + 1 = 2';
        $notes    = 'Number testing';
        $this->unit->run($test, $expected, $name, $notes);

        // simple
        $this->unit->run('foo', 'Foo', '"foo" = "Foo"', 'Check if "foo" = "Foo"');
        $this->unit->run('Foo', 'is_string', '"Foo" = is_string', 'Function is_string = "Foo"');
    }

    /**
     * Count failed testing
     * @param  array List od result test
     * @return int   Total failed test
     */
    private function count_failed($tests)
    {
        $count = 0;
        foreach ($tests as $test) {
            if ($test['Result'] == 'Failed') {
                $count++;
            }
        }
        return $count;
    }

    /**
     * Index - default
     * @return output View
     */
    public function index()
    {
        $this->run_tests();
        $test_result = $this->unit->result();

        $data['tests']  = $test_result;
        $data['count']  = count($test_result);
        $data['failed'] = $this->count_failed($test_result);

        // header('Content-type: application/json');
        // echo json_encode($test_result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        // die();

        $this->load->view('ut_view', $data);
    }

    /**
     * Construct/Initial
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }
}