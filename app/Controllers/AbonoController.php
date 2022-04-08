<?php

namespace App\Controllers;

use App\Models\PrestamoModel;
use App\Models\AbonoModel;


class AbonoController extends BaseController
{
    public function index($id_prestamo)
    {
        $prestamoModel = new PrestamoModel();
        $abonoModel = new AbonoModel();
        $data['prestamo'] = $prestamoModel
            ->select('prestamo.*, empleado.emp_nombre')
            ->join('empleado', 'prestamo.id_empleado = empleado.id_empleado')
            ->find($id_prestamo);

        $data['abonos'] = $abonoModel->where('id_prestamo', $id_prestamo)->find();

        $totalAbonoCapital = $abonoModel->selectSum('monto_capital')->where('id_prestamo', $id_prestamo)->first();
        $resto = $data['prestamo']->monto - $totalAbonoCapital->monto_capital ?? 0;
        $pagoFijo = $data['prestamo']->monto / $data['prestamo']->duracion;
        $interes = $resto * 0.1;
        $total = $pagoFijo + $interes;

        $data['pagoFijo'] = number_format($pagoFijo, 2);
        $data['resto'] = number_format($resto, 2);
        $data['interes'] = number_format($interes, 2);
        $data['total'] = number_format($total, 2);
        return view('abono/index', $data);
    }

    public function registrar($id_prestamo)
    {
        $prestamoModel = new PrestamoModel();
        $abonoModel = new AbonoModel();
        $data['prestamo'] = $prestamoModel
            ->select('prestamo.*, empleado.emp_nombre')
            ->join('empleado', 'prestamo.id_empleado = empleado.id_empleado')
            ->find($id_prestamo);

        $data['abonos'] = $abonoModel->where('id_prestamo', $id_prestamo)->find();

        $totalAbonoCapital = $abonoModel->selectSum('monto_capital')->where('id_prestamo', $id_prestamo)->first();
        $resto = $data['prestamo']->monto - $totalAbonoCapital->monto_capital ?? 0;
        $pagoFijo = $data['prestamo']->monto / $data['prestamo']->duracion;
        $interes = $resto * 0.1;
        $total = $pagoFijo + $interes;

        $abonoModel->insert([
            'abn_fecha' => date('Y-m-d'),
            'monto_capital' => $pagoFijo,
            'monto_interes' => $interes,
            'montototal' => $total,
            'id_prestamo' => $id_prestamo
        ]);

        session()->setFlashdata('success', 'El pago fue registrado');
        return redirect()->to(base_url('prestamos/detalles/' . $id_prestamo));
    }
}
