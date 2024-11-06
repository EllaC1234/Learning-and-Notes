# Flask back-end server + Plotly charting library (not strictly required) + React interactive components = Dash

# Libraries:
# Dash - provides backbone, manages error handling and interactivity
# Dash Core Components - interactive components
# Dash HTML Components - provides HTML tags in Python
# Dash Bootstrap Components - adds Bootstrap functionality for styling

# Imports
import dash
import dash_html_components as html
import dash_core_components as dcc
import dash_bootstrap_components as dbc

# Initialising the app
app = dash.Dash(__name__,  external_stylesheets=[dbc.themes.MINTY]) # The special variable __name__ stores the name of the currently running script in Python

# Creating the app's layout
app.layout = html.Div([
    html.H1('Poverty and Equity Database', # Available parameters: children, className, id, style
            style={'color': 'blue',
                   'fontSize': '40px'}),
    html.H2('The World Bank'),
    dbc.Tabs([
       dbc.Tab([
           html.Ul([
               html.Br(),
               html.Li('Number of Economies: 170'),
               html.Li('Temporal Coverage: 1974 - 2019'),
               html.Li('Update Frequency: Quarterly'),
               html.Li('Last Updated: March 18, 2020'),
               html.Li([
                   'Source: ',
                   html.A('https://datacatalog.worldbank.org/dataset/poverty-and-equity-database',
                          href='https://datacatalog.worldbank.org/dataset/poverty-and-equity-database')
               ])
           ])

       ], label='Key Facts'),
        dbc.Tab([
            html.Ul([
                html.Br(),
                html.Li('Book title: Interactive Dashboards and Data Apps with Plotly and Dash'),
                html.Li(['GitHub repo: ',
                         html.A('https://github.com/PacktPublishing/Interactive-Dashboards-and-Data-Apps-with-Plotly-and-Dash',
                                href='https://github.com/PacktPublishing/Interactive-Dashboards-and-Data-Apps-with-Plotly-and-Dash')
                         ])
            ])
        ], label='Project Info')
    ]),
])


# Running app
if __name__ == '__main__':
    app.run_server(debug=True)