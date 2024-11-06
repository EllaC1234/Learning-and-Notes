import dash
import dash_html_components as html
import dash_core_components as dcc
import dash_bootstrap_components as dbc
from dash.dependencies import Output, Input

app = dash.Dash(__name__,  external_stylesheets=[dbc.themes.MINTY]) 

app.layout = html.Div([
   dcc.Dropdown(id='color_dropdown',
               options=[{'label': color, 'value': color}
                  for color in ['blue', 'green', 'yellow']]),
   html.Div(html.Br(), id='color_output')
])

@app.callback(Output('color_output', 'children'),
              Input('color_dropdown', 'value'))
def display_selected_color(color):
   if color is None:
      color = 'nothing'
   return 'You selected ' + color

if __name__ == '__main__':
    app.run_server(debug=True)