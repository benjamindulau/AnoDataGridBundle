# AnoDataGridBundle

## Installation


## Usage


### Building the grid

```PHP
class DashboardController extends AdminController
{
    public function gridAction(Request $request, $page = 1, $pageSize = 10)
    {
        $factory = $this->getDataGridFactory();
        $grid = $factory->createBuilder('my_grid')
            ->addColumn('id', 'text', array(
                'label' => 'ID',
                'property_path' => 'id',
            ))
            ->addColumn('title', 'text', array(
                'label' => 'Title',
                'property_path' => 'title',
            ))
            ->addColumn('author', 'text', array(
                'label' => 'Author',
                'property_path' => 'author.name',
            ))
            ->addColumn('date', 'date', array(
                'label' => 'Released at',
                'property_path' => 'releasedAt',
            ))
            ->addColumn('price', 'money', array(
                'label' => 'Price',
                'property_path' => 'price',
            ))
            ->addColumn('edit', 'action', array(
                'label' => 'Edit',
                // 'callback' => function() {

                },
            ))
            ->getDataGrid()
        ;

        return $this->render('MyAdminBundle::grid.html.twig', array(
            'grid' => $grid->createView(),
        ));
    }

    /**
     * @return \Ano\DataGrid\DataGridFactoryInterface
     */
    public function getDataGridFactory()
    {
        return $this->get('ano_data_grid.data_grid.factory');
    }
}
```

### Rendering the grid

```Twig
{% data_grid_theme grid 'MyAdminBundle::grid_theme.html.twig' %}

<table class="datagrid">
    {{ grid_head(grid) }}
    {{ grid_body(grid) }}
    {{ grid_foot(grid) }}
</table>
```