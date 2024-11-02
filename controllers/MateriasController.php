<?php

require_once 'BaseController.php';

class MateriasController extends BaseController
{
    public function index(Request $request)
    {
        $page = $request->get('page') ?? 1;
        $search = $request->get('search') ?? '';
        $params = $search ? ['search' => $search] : [];

        $data = DB::table('asignaturas')->where('name', 'LIKE', '%' . $search . '%')->paginate(15, $page);
        $materias = $data->getItems();
        $paginador = $data->renderPagination('/materias', $params);

        return $this->view('/materias/index', [
            'materias' => $materias,
            'paginador' => $paginador,
            'search' => $search
        ]);
    }

    public function create()
    {
        return $this->view('/materias/create');
    }

    public function insert(Request $request)
    {
        $name = $request->post('name');

        if (!$name) {
            return $this->view('materias/create', [
                'validator' => [
                    "El nombre de la materia es requerido"
                ]
            ]);
        }

        $result = DB::table('asignaturas')->insert([
            'name' => trim($name)
        ]);

        if ($result > 0) {
            $this->setFlash("La asignatura fue creada correctamente", "success");
            return $this->redirect('materias');
        }

        return $this->view('materias/create', [
            'validator' => [
                "No se pudo guardar el registro"
            ]
        ]);
    }

    public function edit($id)
    {
        $materia = DB::table('asignaturas')->where('id', '=', $id)->first();

        if ($materia) {
            return $this->view('materias/edit', ['materia' => $materia]);
        } else {
            $this->setFlash("La asignatura no fue encontrada", "danger");
            return $this->redirect('materias');
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->post('name');

        if (!$name) {
            return $this->view('materias/edit', [
                'validator' => [
                    "El nombre de la materia es requerido"
                ]
            ]);
        }

        $materia = DB::table('asignaturas')->where('id', '=', $id)->first();

        if ($materia) {
            $result = DB::table('asignaturas')->where('id', '=', $id)->update([
                'name' => trim($name),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($result > 0) {
                $this->setFlash("La asignatura fue actualizada correctamente", "success");
                return $this->redirect('materias');
            }

            return $this->view('materias/edit', [
                'validator' => [
                    "No se pudo actualizar el registro"
                ]
            ]);
        }

        $this->setFlash("La asignatura no fue encontrada", "danger");
        return $this->redirect('materias');
    }

    public function delete($id)
    {
        $materia = DB::table('asignaturas')->where('id', '=', $id)->first();

        if ($materia) {
            $result = DB::table('asignaturas')->where('id', '=', $id)->delete();

            if ($result > 0) {
                $this->setFlash("La asignatura fue eliminada correctamente", "success");
                return $this->redirect('materias');
            }

            $this->setFlash("Error al eliminar una asignatura", "danger");
            return $this->redirect('materias');
        }

        $this->setFlash("La asignatura no fue encontrada", "danger");
        return $this->redirect('materias');
    }
}
